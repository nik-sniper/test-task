<script>
const appElement = document.getElementById('app');
export default {
    data() {
        return {
            link: JSON.parse(appElement.getAttribute('data-link')) || {},
            results: [],
            notification: '',
        };
    },
    computed: {
        linkUrl() {
            return  window.location.protocol + window.location.hostname + `/page/${this.link.id}`;
        }
    },
    methods: {
        showNotification(message, time) {
            this.notification = message;
            setTimeout(() => {
                this.notification = '';
            }, time);
        },
        async showResults() {
            try {
                const response = await axios.get(`/api/game-result/${this.link.user_id}`);
                this.results = response.data.data;
            } catch (error) {
                console.error(error);
            }
        },
        async generateLink() {
            try {
                const response = await axios.post(`/api/link/${this.link.user_id}/create`);
                this.link = response.data.data;

                this.showNotification('Generate new link ' + this.linkUrl, 15000);
            } catch (error) {
                console.error(error);
            }
        },
        async deactivateLink() {
            try {
                await axios.patch(`/api/link/${this.link.id}/disable`);

                this.showNotification('Current link disabled!', 5000);
            } catch (error) {
                console.error(error);
            }
        },
        async feelingLucky() {
            try {
                const response = await axios.post(`/api/game-result/${this.link.user_id}`);

                let result = response.data.data;

                this.results = [result];
            } catch (error) {
                console.error(error);
            }
        }
    },
}
</script>

<template>
    <div class="container mx-auto mt-10 p-4">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Welcome to Page A</h1>

            <!-- Уведомления -->
            <div v-if="notification" class="mb-6 p-4 bg-blue-100 text-blue-700 rounded">
                <p>{{ notification }}</p>
            </div>

            <!-- Отображение текущей ссылки -->
            <div v-if="link" class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                <p class="font-semibold mb-2">Current link:</p>
                <a :href="linkUrl" class="text-blue-500 break-words">{{ linkUrl }}</a>
            </div>

            <div class="space-y-6">
                <!-- Кнопка для генерации новой ссылки -->
                <button @click="generateLink" class="w-1/2 bg-indigo-400 text-white py-3 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  ">
                    Generate New Link
                </button>

                <!-- Кнопка для деактивации текущей ссылки -->
                <button v-if="link" @click="deactivateLink" class="w-1/2 bg-red-400 text-white py-3 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Deactivate Link
                </button>

                <!-- Кнопка "I'm Feeling Lucky" -->
                <button v-if="link" @click="feelingLucky" class="w-full bg-yellow-400 text-white py-3 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                    I'm Feeling Lucky
                </button>

                <!-- Кнопка "I'm Feeling Lucky" -->
                <button v-if="link" @click="showResults" class="w-full bg-green-400 text-white py-3 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    History
                </button>
            </div>

            <!-- Отображение последних 3 результатов -->
            <div v-if="results.length > 0" class="mt-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Results</h2>
                <ul class="space-y-4">
                    <li v-for="(result, index) in results" :key="index" class="p-4 bg-gray-100 rounded-lg shadow">
                        <p class="font-semibold">Result: <span class="font-normal">{{ result.result }}</span></p>
                        <p class="font-semibold">Number: <span class="font-normal">{{ result.number }}</span></p>
                        <p class="font-semibold">Win Amount: <span class="font-normal">{{ result.win_sum }}</span></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
