function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "navbar navbar-dark bg-primary bg-gradient navbar-expand-md fixed-top";
}

function showToast() {
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

function setNavcol() {
    let navcol = document.getElementById('navcol').value;

    if (navcol == "not changed") {
        let navcolFromCookie = getCookie("navcol")
        document.getElementById('navbar').className = navcolFromCookie;
    } else {
        document.getElementById('navbar').className = navcol;
        document.cookie = "navcol=" + navcol;
    }
}

if (document.getElementById('detail_img')) {
    let detailImage = document.getElementById('detail_img');

    detailImage.addEventListener("mouseenter", function () {
        detailImage.style.boxShadow = "10px 10px 20px #999";
        detailImage.style.transition = "0.3s ease-in-out";
        detailImage.style.width = "99%";
        detailImage.style.height = "auto";
    })
    detailImage.addEventListener("mouseleave", function () {
        detailImage.style.boxShadow = "";
        detailImage.style.width = "";
        detailImage.style.height = "";
    })
}