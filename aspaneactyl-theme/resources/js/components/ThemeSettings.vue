<template>
    <div>
        <h3>Theme Settings</h3>
        <form @submit.prevent="updateSettings">
            <div>
                <label for="logo_url">Logo URL:</label>
                <input type="text" v-model="settings.logo_url" placeholder="Enter logo URL">
            </div>

            <div>
                <label for="background_url">Background URL:</label>
                <input type="text" v-model="settings.background_url" placeholder="Enter background URL">
            </div>

            <div>
                <label for="welcome_box_enabled">Enable Welcome Box:</label>
                <input type="checkbox" v-model="settings.welcome_box_enabled">
            </div>

            <button type="submit">Save Settings</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            settings: {
                logo_url: '',
                background_url: '',
                welcome_box_enabled: true,
            }
        };
    },
    mounted() {
        this.getSettings();
    },
    methods: {
        getSettings() {
            axios.get('/admin/theme-settings')
                .then(response => {
                    this.settings = response.data;
                })
                .catch(error => {
                    console.log('Error:', error);
                });
        },
        updateSettings() {
            axios.post('/admin/theme-settings', this.settings)
                .then(response => {
                    alert(response.data.message);
                })
                .catch(error => {
                    console.log('Error:', error);
                });
        }
    }
};
</script>
