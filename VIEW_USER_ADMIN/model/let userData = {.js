let userData = {
    firstName: 'John',
    lastName: 'Doe',
    email: 'john.doe@example.com',
    password: '123456',
    dob: '01/01/2000',
    role: 'User'
};

localStorage.setItem('userData', JSON.stringify(userData));