const axios = require('axios');

(async () => {
    try {
        console.log("Registering...");
        const res = await axios.post('http://localhost:8000/api/v1/auth/register', {
            name: "Sanctum Test",
            email: "sanctum_" + Date.now() + "@test.com",
            phone: "9998887771",
            password: "password123",
            password_confirmation: "password123",
            role: "customer"
        });
        
        const token = res.data.data.token;
        console.log("Got token:", token);

        console.log("Testing auth:sanctum route...");
        const meRes = await axios.get('http://localhost:8000/api/v1/auth/me', {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
        console.log("ME SUCCESS:", meRes.data.success);
        
        console.log("Testing POST requirements...");
        const reqRes = await axios.post('http://localhost:8000/api/v1/requirements', {
            title: "Test Requirement",
            description: "Test description",
            category_id: 1,
            city: "Patna",
            district: "Patna",
            name: "Test User",
            phone: "9998887771"
        }, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
        console.log("REQUIREMENT SUCCESS:", reqRes.data.success);

    } catch (e) {
        console.error("ERROR:");
        if (e.response) {
            console.error(e.response.status, e.response.data);
        } else {
            console.error(e.message);
        }
    }
})();
