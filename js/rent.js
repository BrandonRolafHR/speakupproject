const museumsContainer = document.querySelector(".list-museums")

function loadMuseums(url, succesHandler) {
    fetch(url)
        .then (res => {
            if (!res.ok) {
                throw new Error ("url bestaat niet: " + res.statusText);
            }
            return res.json()
        })
        .then (succesHandler)
        .catch (errorHandler)
}

function showMuseums(data) {
    console.log(data);
    for (let museum of data) {
        const museumDiv = document.createElement("div");
        museumDiv.classList.add("museum-card");

        const name = document.createElement("h3")
        name.innerText = museum.name
        const img = document.createElement("img")
        img.src = museum.img
        const place = document.createElement("p")
        place.innerText = museum.place

        museumDiv.append(img)
        museumDiv.append(name)
        museumDiv.append(place)
        museumsContainer.append(museumDiv)

        museumsContainer.addEventListener("click", hirePopup)
    }
}

function hirePopup() {

}
function errorHandler(error) {
    console.log(error);
}
loadMuseums("./webservice/actions.php", showMuseums)