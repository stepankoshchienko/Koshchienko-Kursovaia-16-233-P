<template>
    <div class="register-page">
        <Header />

        <div class="register-wrapper">
            <div class="register-box">

                <!-- Левая часть — форма -->
                <div class="left-side">
                    <h1 class="register-title">Регистрация</h1>

                    <form @submit.prevent="register" class="register-form" autocomplete="email">

                        <input type="email" v-model="form.email" placeholder="Адрес электронной почты..." required autocomplete="tel">

                        <input type="tel" v-model="form.phone" placeholder="Номер телефона..." required>

                        <input type="password" v-model="form.password" placeholder="Пароль..." required class="register-pass">

                        <input type="password" v-model="form.password_confirmation" placeholder="Повторите пароль..." required class="register-pass">

                        <button type="submit" class="register-btn">Зарегистрироваться</button>

                        <a href="/login" class="login-link">Есть аккаунт? Войти...</a>
                    </form>
                </div>

                <!-- Правая часть — картинка -->
                <div class="right-side">
                    <img src="/public/src/images/Register.png" alt="pie" class="pie-img">
                </div>

            </div>
        </div>

        <Footer />
    </div>
</template>

<script>
import Footer from '../components/Footer.vue';
import Header from '../components/Header.vue';

export default {
    components: { Header, Footer },
    data() {
        return {
            form: {
                email: '',
                phone: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    methods: {
        register() {
            this.$inertia.post('/register', this.form);
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap');
@font-face {
  font-family: 'Roboto';
  src: url('/public/src/fonts/Roboto.ttf') format('ttf');
}


.register-page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: #FFF6E5;
}

.register-wrapper {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
}

.register-box {
    width: 720px;
    height: 100%;
    background: #DDA642;
    border-radius: 16px;
    padding: 40px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 100px;
}

.left-side {
    width: 55%;
}

.register-title {
    font-size: 30px;
    font-weight: 900;
    margin-bottom: 25px;
    font-family: "Stalinist One", sans-serif;
}

.register-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    font-family: "Roboto", sans-serif;
}

.register-form input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 8px;
    border: 2px solid #C68A1F;
    background: #FFE2AE; 
    font-size: 15px;
}

.register-btn {
    width: 285px;
    padding: 11px 0;
    background: #000; 
    color: #DDA642;
    border-radius: 10px;
    font-size: 20px;
    cursor: pointer;
    border: none;
    font-family: "Roboto", sans-serif;
}

.register-btn:hover {
    background: #5f5747; 
    transition: 0.25s ease;
}

.register-pass {
    width: 250px !important;
}

.login-link {
    font-size: 13px;
    color: #000;
    margin-top: 5px;
}

.right-side {
    width: 45%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.pie-img {
    width: 260px;
    height: auto;
    user-select: none;
    margin-left: 70px;
}

</style>
