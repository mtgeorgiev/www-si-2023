const createUserListElement = ({id, email, birthdate, gender}) => {
    const listElement = document.createElement('div');
    listElement.setAttribute('id', id);
    listElement.innerHTML = `<span class="email">${email}</span><input type="date" value="${birthdate}" readonly/>`;

    return listElement;
}

const userOnClick = event => {

    // event.target
}

const showSingleUserData = userId => {
    fetch('./endpoints/user.php?id=' + userId)
        .then(response => response.json())
        .then(user => {

            const container = document.getElementById('user-info');
            container.innerHTML = '';

            let genderNames = {
                'F': 'Female',
                'M': 'Male',
                'O': 'Other'
            };

            const userInfoElement = document.createElement('div');
            userInfoElement.innerHTML = `<span>Email is: ${user.email}</span>
                <input type="date" value="${user['birthdate']}" readonly/>
                <div class="gender>${genderNames[user['gender']]}</div>`;

                container.appendChild(userInfoElement);
        });
}

const showUsers = () => {
    fetch('./endpoints/user.php')
        .then(response => response.json())
        .then(simpleUserData => {
            const container = document.getElementById('container');
            container.innerHTML = '';

            simpleUserData.forEach(user => {
                const emailElement = document.createElement('div');
                emailElement.setAttribute('id', user['id']);

                emailElement.innerHTML = `<span class="email">${user['email']}</span>`;

                emailElement.addEventListener('click', event => {
                    event.stopPropagation();
                    showSingleUserData(user['id']);
                });

                container.appendChild(emailElement);
            });

            // container.innerHTML = '';
            // users.map(createUserListElement)
            // .forEach(element => container.appendChild(element))
        });
}

document.getElementById('container').addEventListener('click', showUsers);

