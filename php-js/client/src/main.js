function init() {
    fetchData('http://localhost:8000')
        .then( data => {
            data = Object.entries(data)
            drawTable(data)
            return data
        })
        .then( data => {
            clickSort(data)
        })
}

async function fetchData(url) {
    try {
        loader()
        const response = await fetch(url)

        if(!response.ok) throw new Error(`HTTP error ${response.status}`)

        let data = await response.json()
        loader()

        return data
    } catch (error) {
        console.error('Error fetching data:', error)
        throw error
    }
}

function drawTable(data) {
    let app = document.getElementById('app')
    let countAttempts = data[0][1]['attempts'].length - 1;

    let table = newElement('table', 'table')
    let tr = newElement('tr')

    addTableThead(table, tr, countAttempts)
    addTableTbody(data, table)
    addElement(app, table)
}

function addTableThead(table, tr, attempts) {
    let thead = newElement('thead')
    addElement(tr, newElement('th', '', '#'))
    addElement(tr, newElement('th', 'sort', '№', 'all'))
    addElement(tr, newElement('th', '', 'ФИО'))
    addElement(tr, newElement('th', '', 'Город'))
    addElement(tr, newElement('th', '', 'Машина'))

    for (let i = 0, j = 1; i <= attempts; i++, j++) {
        if (i === attempts)
            addElement(tr, newElement('th', 'sort', 'Общее', attempts))
        else
            addElement(tr, newElement('th', 'sort', 'Попытка ' + j, i))
    }

    addElement(thead, tr)
    addElement(table, thead)
}

function addTableTbody(data, table) {
    let tbody = newElement('tbody')

    data.forEach( ([key, value]) => {
        let attempts = value['attempts']
        let tr = newElement('tr')

        addElement(tr, newElement('td', '', key))
        addElement(tr, newElement('td', '', value['name']))
        addElement(tr, newElement('td', '', value['city']))
        addElement(tr, newElement('td', '', value['car']))

        attempts.forEach( (attempt, i) => {
            addElement(tr, newElement('td', '', attempt))
        })

        addElement(tbody, tr)
    })


    addElement(table, tbody)
}

function clickSort(data) {
    let table = document.querySelector('.table')
    let thead = table.querySelector('thead')

    thead.addEventListener('click', e => {
        let target = e.target
        if (!target.classList.contains('sort')) return
        e.stopPropagation()

        let active = target.classList.contains('active')
        let up = target.classList.contains('up')

        removeAllClass('.sort', 'active', 'up')
        addClass(target, 'active', 'up')

        let tbody = table.querySelector('tbody')
        removeElement(table, tbody)

        let sortAttr = target.dataset.sort;

        data = sortTable(data, sortAttr, up)

        up && target.classList.remove('up')

        addTableTbody(data, table)
    })
}

function sortTable(data, sortAttr, up) {
   if (sortAttr === 'all') {
       return data.sort((a, b) => up ? b[0] - a[0] : a[0] - b[0])
   }
   else {
       return data.sort((a, b) => {
           return up
            ? a[1]['attempts'][sortAttr] - b[1]['attempts'][sortAttr]
            : b[1]['attempts'][sortAttr] - a[1]['attempts'][sortAttr]
       })
   }
}

function createElement(elem) {
    return document.createElement(elem)
}

function newElement(elem, cssClass = '', text = '', attr = '') {
    elem = document.createElement(elem)
    elem.textContent = text
    if (cssClass !== '') elem.className = cssClass
    if (attr !== '') elem.setAttribute('data-sort', attr)

    return elem
}

function addElement(elem, add) {
    elem.appendChild(add)
}

function removeElement(elem, remove) {
    elem.removeChild(remove);
}

function removeAllClass(cls, ...clss) {
    cls = document.querySelectorAll(cls)
    cls.forEach( item => item.classList.remove(...clss))
}

function addClass(elem, ...clss) {
     elem.classList.add(...clss)
}

function findSelector(elem, css) {
    return elem.querySelector(css)
}

function loader() {
    let wrap = document.querySelector('.wrap-loader')

    let loader = findSelector(wrap, '.loader')

    if (loader === null)
        addElement(wrap, newElement('div', 'loader'))
    else
        removeElement(wrap, loader)
}

init()