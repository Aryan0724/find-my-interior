const axios = require('axios');

(async () => {
    try {
        const res = await axios.post('http://localhost:8000/api/v1/auth/register', {
            name: "Test Name",
            email: "test_direct_" + Date.now() + "@test.com",
            phone: "9998887771",
            password: "password123",
            password_confirmation: "password123",
            role: "customer"
        });
        console.log("SUCCESS:", res.data);
    } catch (e) {
        console.error("ERROR:");
        if (e.response) {
            console.error(e.response.status, e.response.data);
        } else {
            console.error(e.message);
        }
    }
})();
