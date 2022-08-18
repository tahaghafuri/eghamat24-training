let data = (localStorage.getItem('AAA')) ? JSON.parse(localStorage.getItem('AAA')) : {
    AAA: [],
};

let Record = [];
let submit = document.getElementById('add');
let clear = document.getElementById('clear');
let removeIcon = `حذف`;

renderRecord();

submit.addEventListener('click', e => {
    let entryDate = document.getElementById('entry-date').value;
    let exitDate = document.getElementById('exit-date').value;

    Record.push(entryDate, exitDate);
    data.AAA.push(Record);
    addRecordToDOM(Record);
    dataObjectUpdated();
    Record = [];

    entryDate.value = "";
    exitDate.value = "";
})

function renderRecord() {
    if (!data.AAA.length) return;

    for (let i = 0; i < data.AAA.length; i++) {
        let value = data.AAA[i];
        addRecordToDOM(value);
    }
}

function dataObjectUpdated() {
    localStorage.setItem('AAA', JSON.stringify(data));
}

function addRecordToDOM(text) {
    let tbody = document.getElementById('tbody');
    let row = document.createElement('tr');

    let entryDate = document.createElement('td');
    entryDate.innerText = text[0]
    let exitDate = document.createElement('td');
    exitDate.innerText = text[1]

    let action = document.createElement('td');
    let remove = document.createElement('button');
    remove.classList.add('btn-danger');
    remove.innerHTML = removeIcon;
    remove.addEventListener('click', removeRecord)

    row.appendChild(entryDate);
    row.appendChild(exitDate);

    row.appendChild(action);
    action.appendChild(remove);

    tbody.insertBefore(row, tbody.childNodes[0])
}

function removeRecord() {
    let record = this.parentNode.parentNode;
    let parent = record.parentNode;
    let id = parent.id;
    let value = record.innerText;
    console.log(value);

    if (id === 'tbody') {
        data.AAA.splice(data.AAA.indexOf(value), 1);
    }
    dataObjectUpdated();
    parent.removeChild(record);
}