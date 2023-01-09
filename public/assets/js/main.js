// Display header search when user scroll top 200px
window.onscroll = function (e) {
    if( window.scrollY >= 200 ){
        document.getElementById('header__scroll').style.display = "block";
    }else{
        document.getElementById('header__scroll').style.display = "none";
    }
};

// Example POST method implementation:
async function postData(url = '', data = {}) {
    // Add token for laravel
    data._token = document.querySelector('meta[name="csrf-token"]').attributes.content.value;

    // Default options are marked with *
    const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
        'Content-Type': 'application/json'
        // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    });

    return response.json(); // parses JSON response into native JavaScript objects
}
