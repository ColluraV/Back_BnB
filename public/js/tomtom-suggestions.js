
/*fetch('./apiKey.json')
.then(response=>response.json())
.then(data => {
  const key = data.api_key;
  console.log(key);
});*/


import { api_key } from "./apiKey.js";

let timer;
document.querySelector('input[name="address"]').addEventListener('keyup', function () {
  clearTimeout(timer);
  timer = setTimeout(() => {
    fetchTomTomSuggestions(this.value, 'address');
}, 500);

});

// Fetch info from API TomTom
function fetchTomTomSuggestions(query, field) {
  if (addressDOMElement.value.length >= 5){

    fetch(`https://api.tomtom.com/search/2/search/${query}.json?key=${api_key}`)
    .then(response => response.json())
    .then(data => {
      const suggestions = data.results;
      const suggestionList = document.querySelector(`#${field}-suggestions`);

      suggestionList.innerHTML = '';

      suggestions.forEach(suggestion => {
        const suggestionItem = document.createElement('li');
        suggestionItem.classList.add("list-group-item")
        suggestionItem.textContent = suggestion.address.freeformAddress;
        suggestionItem.addEventListener('click', function () {
          document.querySelector(`input[name="${field}"]`).value = suggestion.address.freeformAddress;
          suggestionList.innerHTML = '';
        });
        suggestionList.appendChild(suggestionItem);
      });
    });

  }

  
}