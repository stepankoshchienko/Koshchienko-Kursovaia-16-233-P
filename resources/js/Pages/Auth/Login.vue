<template>
  <div class="login-page">
    <Header />

    <div class="login-wrapper">
      <div class="login-box">

        <!-- Левая часть — форма -->
        <div class="left-side">
          <h1 class="login-title">Вход</h1>

          <form @submit.prevent="login" class="login-form">
            <input type="email" v-model="form.email" placeholder="Адрес электронной почты..." required autocomplete="email">

            <input type="password" v-model="form.password" placeholder="Пароль..." required class="login-pass" autocomplete="current-password">

            <button type="submit" class="login-btn">Войти</button>

            <a href="/register" class="register-link">Нет аккаунта? Зарегистрироваться...</a>
          </form>
        </div>

        <!-- Правая часть — картинка -->
        <div class="right-side">
          <img src="/public/src/images/Login.png" alt="pie" class="pie-img">
        </div>

      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

export default {
  components: { Header, Footer },
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    login() {
      this.$inertia.post('/login', this.form);
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

.login-page {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: #FFF6E5;
}

.login-wrapper {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 100px;
}

.login-box {
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

.login-title {
  font-size: 30px;
  font-weight: 900;
  margin-bottom: 25px;
  font-family: "Stalinist One", sans-serif;
}

.login-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
  font-family: "Roboto", sans-serif;
}

.login-form input {
  width: 100%;
  padding: 12px 15px;
  border-radius: 8px;
  border: 2px solid #C68A1F;
  background: #FFE2AE; 
  font-size: 15px;
}

.login-btn {
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

.login-btn:hover {
  background: #5f5747; 
  transition: 0.25s ease;
}

.login-pass {
  width: 250px !important;
}

.register-link {
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
  width: 270px;
  height: auto;
  user-select: none;
  margin-left: 50px;
}
</style>
