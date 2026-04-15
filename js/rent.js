window.addEventListener('load', init);
const museumsContainer = document.querySelector(".list-museums")
const searchContainer = document.querySelector("#search-form")
searchContainer.addEventListener("submit", searchMuseum)

const dialog = document.querySelector("dialog")
const detailsContainer = document.querySelector(".details")
const detailNameContainer = document.querySelector(".museum-name")
const closeDetails = document.querySelector("dialog button")
closeDetails.addEventListener("click", () => {
    dialog.close()
})
//Happens when the page is loaded, it will load all museums and show them on the page
function init() {
    loadMuseums("./webservice/actions.php", showMuseums)
}
//This function will fetch the data from the url
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
//This function will search for a museum based on the input value, if there is no value it will load all museums again
function searchMuseum(event) {
    event.preventDefault();
    const searchInput = document.querySelector("#museums")
    const searchValue = searchInput.value.trim()

    if (searchValue) {
        museumsContainer.innerHTML = '';
        loadMuseums(`./Webservice/actions.php?name=${searchValue}`, showMuseums)
    } else {
        loadMuseums("./Webservice/actions.php", showMuseums)
    }
}
//This function will show the museums on the page, it will create a card for each museum and append it to the container
function showMuseums(data) {
    console.log(data);
    museumsContainer.innerHTML = '';
    for (let museum of data) {
        const museumDiv = document.createElement("div");
        museumDiv.classList.add("museum-card");

        museumDiv.id = museum.id

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

        museumsContainer.addEventListener("click", loadHire)
    }
}
//This function will load the details of the museum that is clicked on
function loadHire(e) {
    console.log(e.target.id)
    if (e.target.className === "museum-card") {
        loadMuseums(`./Webservice/actions.php?id=${e.target.id}`, hirePopup);
    }

}
//This function will show the details of the museum in a popup together with a form
function hirePopup(details) {
    console.log(details);

    dialog.showModal()
    detailsContainer.innerHTML = '';
    detailNameContainer.innerHTML = '';

    const nameDetail = document.createElement('h1');
    nameDetail.innerText = details.name
    detailNameContainer.append(nameDetail)

    const leftDetail = document.createElement('div');
    leftDetail.classList.add('left-detail')
    const wheelchairsAmount = document.createElement ('p')
    wheelchairsAmount.innerText = `Aantal rolstoelen beschikbaar per dag: ${details.wheelchairs}`

    const hireForm = document.createElement('form')
    const formTitle = document.createElement('h2')
    formTitle.innerText = 'Huur uw Speak-up rolstoel'
    const labelName = document.createElement("label")
    labelName.innerText = 'Voor- & Achternaam'
    labelName.htmlFor = 'name'
    const fillName = document.createElement("input")
    fillName.type = 'text'
    fillName.name = 'name'
    fillName.placeholder = "vul uw naam in"
    const labelPhone = document.createElement('label')
    labelPhone.innerText = 'Telefoonnummer'
    labelName.htmlFor = 'number'
    const fillPhone = document.createElement("input")
    fillPhone.type = 'tel'
    fillPhone.name = 'number'
    fillPhone.placeholder = 'vul uw telefoonnummer in'
    const labelEmail = document.createElement("label")
    labelEmail.innerText = 'E-mail'
    labelEmail.htmlFor = 'email'
    const fillEmail = document.createElement('input')
    fillEmail.type = 'text'
    fillEmail.name = 'email'
    fillEmail.placeholder = 'vul uw e-mail in'
    const labelDate = document.createElement("label")
    labelDate.innerText = 'Datum'
    labelDate.htmlFor = 'date'
    const fillDate = document.createElement("input")
    fillDate.type = 'date'
    fillDate.name = 'date'
    const submitBtn = document.createElement('button')
    submitBtn.type = 'submit'
    submitBtn.innerText = 'Versturen'

    hireForm.append(formTitle)
    hireForm.append(labelDate)
    hireForm.append(fillDate)
    hireForm.append(labelName)
    hireForm.append(fillName)
    hireForm.append(labelPhone)
    hireForm.append(fillPhone)
    hireForm.append(labelEmail)
    hireForm.append(fillEmail)
    hireForm.append(submitBtn)

    leftDetail.append(wheelchairsAmount)
    leftDetail.append(hireForm)

    const rightDetail = document.createElement('div')
    rightDetail.classList.add('right-detail')
    const image = document.createElement('img')
    image.src = details.img

    const websiteMuseum = document.createElement("a")
    websiteMuseum.innerText = 'Entree tickets kopen'
    websiteMuseum.href = details.url

    rightDetail.append(image)
    rightDetail.append(websiteMuseum)

    detailsContainer.append(leftDetail)
    detailsContainer.append(rightDetail)
}
function errorHandler(error) {
    console.log(error);
}

