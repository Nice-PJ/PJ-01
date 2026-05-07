
function submit_login() {
    let timerInterval
    Swal.fire({
        position: 'top-end',
        html: 'กำลังสมัครสมาชิก <b></b> ms',
        timer: 300,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
            
        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            Swal.fire({
                    title: 'เข้าสู่ระบบสำเร็จ',
                    text: "ยินดีต้อนรับ",
                    icon: 'success',
                    confirmButtonColor: '#374687',
                    confirmButtonText: 'ตกลง'
                })
        }
    })
}

function submit_register() {
    let timerInterval
    Swal.fire({
        position: 'top-end',
        html: 'กำลังสมัครสมาชิก <b></b> ms',
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
            $(".md-register").modal('hide')
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            Swal.fire({
                    title: 'สมัครสมาชิกสำเร็จ',
                    text: "กรุณาเข้าสู่ระบบ",
                    icon: 'success',
                    confirmButtonColor: '#212121',
                    confirmButtonText: 'ตกลง'
                })
        }
    })
}