;(function () {
    $('#pt-darkmode-link a').on('click', function (e) {
        e.preventDefault()
        let darkmode = /\bdarkmode=1\b/.test(document.cookie)

        if (darkmode) {
            document.body.classList.remove('darkmode')
            document.cookie = `darkmode=; Path=/; Max-Age=0;`
        } else {
            document.body.classList.add('darkmode')
            document.cookie = 'darkmode=1; Path=/;'
        }
    })
})()
