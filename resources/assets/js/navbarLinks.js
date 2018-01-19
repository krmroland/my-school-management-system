const links = document.querySelectorAll(".navbar .nav-link");

function cleanLink(link) {
    return link.replace(/^\//, "");
}
const href = cleanLink(location.pathname);

function tryActivatingLink(link) {
    href.includes(cleanLink(link.pathname))
        ? link.classList.add("active")
        : null;
}
links.forEach(link => tryActivatingLink(link));
