const konten = document.querySelectorAll(".news-card");

konten.forEach(e => {
    e.addEventListener('click', () => {
        const id = e.children[0].innerText;
        window.location.href = "/day1223.github.io/postest2web/read.php?id="+id;
    })
});