<template>
  <div class="profile-layout">
    <Header />

    <main class="profile-main">
      <div class="profile-box">
        <div class="profile-content">
          <!-- Личные данные слева -->
          <div class="profile-section profile-data">
            <h1>Личные данные</h1>

            <div class="profile-input-group">
              <label>Имя</label>
              <input type="text" v-model="form.first_name">
            </div>

            <div class="profile-input-group">
              <label>Фамилия</label>
              <input type="text" v-model="form.last_name">
            </div>

            <div class="profile-input-group">
              <label>Номер телефона</label>
              <input type="text" v-model="form.phone">
            </div>

            <div class="profile-input-group">
              <label>Дата рождения</label>
              <input type="date" v-model="form.birth_date">
            </div>

            <div class="profile-input-group">
              <label>Почта</label>
              <input type="text" v-model="form.email">
            </div>

            <div class="profile-input-group checkbox-group">
              <label class="checkbox-label">
                <input type="checkbox" v-model="form.promotional_emails">
                <span>Получать рекламные рассылки</span>
              </label>
            </div>

            <button @click="updateProfile" class="btn-save-all">Сохранить</button>
            <button @click="logout" class="btn-logout">Выйти</button>
          </div>

          <!-- Заказы справа -->
          <div class="profile-orders profile-orders-right">
            <h2>Активные заказы</h2>
            <div class="order-card" v-for="order in activeOrders" :key="order.id">
              <h3>Заказ №{{ order.id }}</h3>
              <p>{{ order.name }}</p>
              <span class="status active">🔥 В обработке</span>
            </div>

            <h2>Завершённые</h2>
            <div class="order-card" v-for="order in completedOrders" :key="order.id">
              <h3>Заказ №{{ order.id }}</h3>
              <p>{{ order.name }}</p>
              <span class="status done">✔ Завершён</span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <Footer />
  </div>
</template>

<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

export default {
  components: { Header, Footer },
  data() {
    return {
      form: {
        first_name: "",
        last_name: "",
        phone: "",
        email: "",
        birth_date: "",
        promotional_emails: false,
      },
      activeOrders: [
        { id: 62, name: "Чебурек «Свинина-Говядина»" },
        { id: 60, name: "Чебурек «Жюльен»" },
      ],
      completedOrders: [
        { id: 59, name: "Чебурек «Банан-Шоколад»" },
      ]
    };
  },
  computed: {
    userAvatar() {
      return "/src/images/avatar.png";
    }
  },
  mounted() {
    this.form = { ...this.user };
  },
  props: {
    user: Object
  },
  methods: {
    updateProfile() {
      this.$inertia.put("/profile", this.form);
    },
    logout() {
      this.$inertia.post("/logout");
    },
  },
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

.profile-layout {
  font-family: 'Roboto', 'sans-serif';
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  background: #FFF6E5;
}

.profile-main {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 0;
}

.profile-box {
  width: 100%;
  max-width: 1200px; 
  background: #DDA642;
  height: 100%;
  padding: 30px;
  border-radius: 22px;
  box-sizing: border-box;
}

.profile-content {
  display: grid;
  grid-template-columns: 2fr 1fr; 
  gap: 20px;
}

.profile-section,
.profile-orders {
  background: #FFE2AE;
  padding: 20px;
  border-radius: 18px;
}

.profile-section h1 {
  font-family: "Stalinist One", sans-serif;
}

.profile-orders h2 {
  font-family: "Stalinist One", sans-serif;
}

.profile-input-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 15px;
}

.profile-input-group input {
  width: 100%;
  border-radius: 8px;
  border: 1px solid #D4A45D;
  padding: 10px;
  background: #FFCC80;
  font-size: 16px;
  box-sizing: border-box;
}

.checkbox-group {
  width: 100%;
}

.checkbox-label {
  display: flex;
  align-items: center;
  padding: 10px;
  background: #FFCC80;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
}

.checkbox-label input[type="checkbox"] {
  flex-shrink: 0;      
  width: 24px;
  height: 24px;
  margin-right: 12px;   
}

.checkbox-label span {
  flex: 1;             
}

.btn-save-all,
.btn-logout {
  background: #E6A54D;
  padding: 12px;
  border-radius: 12px;
  width: 100%;
  cursor: pointer;
  border: none;
  font-family: 'Roboto', sans-serif;
  font-weight: bold;
  margin-top: 10px;
}

.btn-logout {
  background: #D57900;
}

.order-card {
  background: #FFCC80;
  padding: 15px;
  border-radius: 12px;
  margin-bottom: 10px;
}

.status {
  font-weight: bold;
  display: inline-block;
  margin-top: 5px;
}

.status.active {
  color: #D57900;
}

.status.done {
  color: #008000;
}
</style>
