let apiData;

const apiMessage = document.getElementById('apiLoadingMessage');

const calcPtr = document.getElementById('calc-ptr');
const calcVes = document.getElementById('calc-ves');
const calcEur = document.getElementById('calc-eur');
const calcUsd = document.getElementById('calc-usd');
const calcPtrShow = document.getElementById('calc-ptr-show');
const calcVesShow = document.getElementById('calc-ves-show');
const calcEurShow = document.getElementById('calc-eur-show');
const calcUsdShow = document.getElementById('calc-usd-show');

const ptrConversion = { usd: null, eur: null, ves: null };
const vesConversion = { usd: null, eur: null, ptr: null };
const eurConversion = { usd: null, ves: null, ptr: null };
const usdConversion = { eur: null, ves: null, ptr: null };

function switchInputs(state, inputs) {
    if (state) {
        inputs.forEach(function(input) { input.disabled = state; });
    } else {
        inputs.forEach(function(input) { input.disabled = state });
    }
}

//llamado a la api de petro

function api() {
    const url = 'https://petroapp-price.petro.gob.ve/price/';
    const data = {
        "coins": ["PTR"],
        "fiats": ["USD", "EUR", "BS"]
    };
    fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .catch(error => {
            console.log("Error");
            displayError();
        })
        .then(response => {
            apiData = response.data;
            startCalculator();
        });
}

function displayError() {
    if (window.location.href.includes("calculator")) {
        apiMessage.innerHTML = "Error <br> <span>Connection error.</span>";
    } else {
        apiMessage.innerHTML = "Error <br> <span>Error de conexiÃ³n.</span>";
    }
}

function startCalculator() {
    switchInputs(false, [calcPtr, calcVes, calcEur, calcUsd]);
    //apiMessage.style.display = 'none';
    assignCurrencies(apiData.PTR);
    assignCurrenciesConversions();
}

function filterFloat(e) {
    const key = e.keyCode;
    const chark = String.fromCharCode(key);
    const tempValue = e.target.value + chark;
    const currency = e.target.id;

    if (key >= 48 && key <= 57) {
        if (filter(tempValue, currency) === false) {
            return false;
        } else {
            return true;
        }
    } else {
        if (key == 8 || key == 13 || key == 0) {
            return true;
        } else if (key == 46) {
            if (filter(tempValue, currency) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

function filter(__val__, currency) {
    const preg = currency === 'calc-ptr' ? /^([0-9]+\.?[0-9]{0,8})$/ : /^([0-9]+\.?[0-9]{0,2})$/;

    if (preg.test(__val__) === true) {
        return true;
    } else {
        return false;
    }
}

function clearFields(e) {
    if (e.type == 'click' || e.keyCode == 9) {
        calcPtr.value = '00.00000000';
        calcVes.value = '00.00';
        calcEur.value = '00.00';
        calcUsd.value = '00.00';
        calcPtrShow.value = '00.00000000';
        calcVesShow.value = '00.00';
        calcEurShow.value = '00.00';
        calcUsdShow.value = '00.00';

        if (e.type == 'click') {
            e.target.value = '';
        }

        if (e.keyCode == 9) {
            if (e.target.id === 'calc-ptr') {
                e.target.value = '00.00000000';
            } else {
                e.target.value = '00.00';
            }
        }
    }
}

// factor de conversion del petro a las otra monedas

function assignCurrencies(currenciesPtr) {
    console.log(currenciesPtr)
    ptrConversion.usd = parseFloat(currenciesPtr.USD);
    ptrConversion.eur = parseFloat(currenciesPtr.EUR);
    ptrConversion.ves = parseFloat(currenciesPtr.BS);
}

function assignCurrenciesConversions() {
    // Assign eurConversion Values
    const euroConvertArr = ['usd', 'ves'];
    euroConvertArr.forEach(function(currency) {
        eurConversion[currency] = calculateConversion(ptrConversion.eur, ptrConversion[currency]);
        console.log(calculateConversion(ptrConversion.eur, ptrConversion[currency]))
    });
    eurConversion.ptr = parseFloat((1 / ptrConversion.eur));

    // Assign usdConversion Values
    const dollarConvertArr = ['eur', 'ves'];
    dollarConvertArr.forEach(function(currency) {
        usdConversion[currency] = calculateConversion(ptrConversion.usd, ptrConversion[currency]);
    });
    usdConversion.ptr = parseFloat((1 / ptrConversion.usd));

    // Assign vesConversion Values
    const bolivarConvertArr = ['eur', 'usd'];
    bolivarConvertArr.forEach(function(currency) {
        vesConversion[currency] = calculateConversion(ptrConversion.ves, ptrConversion[currency]);
    });
    vesConversion.ptr = parseFloat((1 / ptrConversion.ves));

}

function calculateConversion(mainValue, toConvertValue) {
    const distance = Math.abs(mainValue - toConvertValue);
    const mainPerConv = (distance * 100) / mainValue;
    const conversion = mainValue < toConvertValue ? 1 + (mainPerConv / 100) : 1 - (mainPerConv / 100);
    return parseFloat(conversion);
}

function calculateResults(e) {
    const numberConversion = parseFloat(e.target.value);
    const currency = e.target.id.substring(e.target.id.length - 3);
    let currencyIndex;

    const currencies = ['ptr', 'ves', 'eur', 'usd'];
    const inputResults = [calcPtr, calcVes, calcEur, calcUsd];
    const inputResultsShow = [calcPtrShow, calcVesShow, calcEurShow, calcUsdShow];
    const currenciesGroups = [ptrConversion, vesConversion, eurConversion, usdConversion];

    for (let i = 0; i < currencies.length; i++) {
        if (currency === currencies[i]) {
            currencyIndex = i;
            break;
        }
    }

    for (let i = 0; i < currencies.length; i++) {
        if (currency === currencies[i]) {
            inputResultsShow[i].value = inputResults[i].value;
            currencies.splice(i, 1);
            inputResults.splice(i, 1);
            inputResultsShow[i].style.display = 'none';
            inputResultsShow.splice(i, 1);
        }
    }

    for (let i = 0; i < currencies.length; i++) {
        if (!(isNaN(numberConversion))) {
            if (currencies[i] === 'ptr') {
                inputResults[i].value = (numberConversion * currenciesGroups[currencyIndex][currencies[i]]).toFixed(8);
            } else {
                inputResults[i].value = (numberConversion * currenciesGroups[currencyIndex][currencies[i]]).toFixed(2);
                inputResults[i].style.display = 'none';
                inputResultsShow[i].style.display = 'block';
                inputResultsShow[i].value = moneda(parseFloat(inputResults[i].value));
            }
        } else {
            if (currencies[i] === 'ptr') {
                inputResults[i].value = '00.00000000';
            } else {
                inputResults[i].value = '00.00';
            }
        }
    }
}

switchInputs(true, [calcPtr, calcVes, calcEur, calcUsd]);
api();

calcPtr.addEventListener('click', clearFields);
calcVes.addEventListener('click', clearFields);
calcEur.addEventListener('click', clearFields);
calcUsd.addEventListener('click', clearFields);

calcPtr.addEventListener('keydown', clearFields);
calcVes.addEventListener('keydown', clearFields);
calcEur.addEventListener('keydown', clearFields);
calcUsd.addEventListener('keydown', clearFields);

calcPtr.addEventListener('keyup', calculateResults);
calcVes.addEventListener('keyup', calculateResults);
calcEur.addEventListener('keyup', calculateResults);
calcUsd.addEventListener('keyup', calculateResults);