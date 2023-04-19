const createUserListElement = ({id, email, birthdate, gender}) => {
    const listElement = document.createElement('div');
    listElement.setAttribute('id', id);
    listElement.innerHTML = `<span class="email">${email}</span><input type="date" value="${birthdate}" readonly/>`;

    return listElement;
}

const showUsers = () => {
    fetch('./endpoints/user.php')
        .then(response => response.json())
        .then(users => {
            const container = document.getElementById('container');
            container.innerHTML = '';
            users.map(createUserListElement)
            .forEach(element => container.appendChild(element))
        });
}

document.getElementById('container').addEventListener('click', showUsers);

