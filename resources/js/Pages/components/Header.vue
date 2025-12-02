<template>
  <header class="header">
    <div class="header__inner">
        <img src="/public/src/icons/Logo.svg" alt="Логотип" class="header__logo" @click="goToMainPage">
        


      <!-- Поле поиска -->
        <div class="header__search">
            <input
                v-model="query"
                type="text"
                placeholder="Поиск"
                @keyup.enter="handleSearch"
            />
            <button @click="handleSearch"><img src="/public/src/icons/Search.svg" alt="Поиск"></button>
        </div>

        <div class="burger" @click="menuOpen = !menuOpen">
          <img src="/public/src/icons/Burger.svg" alt="menu">
        </div>

        <!-- Навигация -->
        <nav class="header__nav">
            <a href="#" @click.prevent="goToMenu">Меню</a>
            <a href="#" @click.prevent="goToReviews">Отзывы</a>

        <!-- Контейнер с иконками и статусом -->
            <div class="header__actions">
                <div class="header__icons">
                    <img src="/public/src/icons/Profile.svg" alt="Профиль" @click="goToProfile" >
                    <img src="/public/src/icons/Cart.svg" alt="Корзина" @click="goToCart">
                </div>
                <div class="header__status">
                    ⏰ Работаем <strong>24/7</strong>
                </div>
            </div>
        </nav>
        <!-- Mobile menu -->
        <div class="mobile-menu" :class="{ active: menuOpen }">
          <a href="#" @click.prevent="goToMenu">Меню</a>
          <a href="#" @click.prevent="goToReviews">Отзывы</a>
          <div class="header__icons mobile-icons">
            <img src="/public/src/icons/Profile.svg" @click="goToProfile">
            <img src="/public/src/icons/Cart.svg">
          </div>
          <div class="header__status">⏰ Работаем <strong>24/7</strong></div>
        </div>


    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      query: "", // строка поиска
      menuOpen: false
    };
  },

  methods: {
    goToMenu() {
      this.$inertia.visit('/', {
        only: [],
        preserveScroll: false,
        onSuccess: () => {
          // После загрузки главной страницы, прокрутить к меню
          this.$nextTick(() => {
            const menu = document.getElementById('menu');
            if (menu) {
              window.scrollTo({
                top: menu.offsetTop - 80, 
                behavior: 'smooth'
              });
            }
          });
        }
      });
    },
    goToReviews() {
      this.$inertia.visit('/', {
        only: [],
        preserveScroll: false,
        onSuccess: () => {
          // После загрузки главной страницы, прокрутить к меню
          this.$nextTick(() => {
            const reviews = document.getElementById('reviews');
            if (reviews) {
              window.scrollTo({
                top: reviews.offsetTop - 80, 
                behavior: 'smooth'
              });
            }
          });
        }
      });
    },
    handleSearch() {
      if (!this.query.trim()) return; 
      console.log("Поиск:", this.query);
    },
    goToProfile() {
      this.$inertia.visit('/profile');
    },
    goToCart() {
      this.$inertia.visit('/cart');
    },
    goToMainPage() {
      this.$inertia.visit('/');
    },
  },
};


</script>
<style scoped>
@font-face {
  font-family: 'Roboto';
    src: url('/public/src/fonts/Roboto.ttf') format('ttf');
}


.header {
  background-color: #DDA642; 
  padding: 10px 265px;
  font-family: 'Roboto', sans-serif;
  background-size: cover;
}

.header__inner {
  max-width: 1670px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  margin: 0 auto;
  flex-wrap: wrap; 
}

.header__logo {
  cursor: pointer;
  width: 80px;
  height: 80px;
}

.header__search {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.header__search input {
  width: 100%;
  max-width: 951px;
  font-size: 14px;
  border: none;
  outline: none;
  border-radius: 13px 0 0 13px;
  height: 35px; 
  padding: 0 10px;
  box-sizing: border-box;
}

.header__search button {
  background-color: #fff;
  border: none;
  border-radius: 0 10px 10px 0;
  height: 35px; 
  width: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.header__search img {
  height: 25px; 
  width: 22px;
}

.header__nav {
  display: flex;
  gap: 25px;
  align-items: center;
}

.header__nav a {
  text-decoration: none;
  color: #000;
  font-size: 18px;
}

.header__icons {
  display: flex;
  gap: 25px;
  cursor: pointer;
}

.header__icons img {
  width: 35px;
  height: 35px;
}

.header__status {
  background-color: #f6d48e;
  border-radius: 8px;
  padding: 5px 10px;
  font-size: 18px;
  display: flex;
  align-items: center;
  gap: 5px;
  white-space: nowrap; 
  text-align: center; 
}

.header__actions {
  display: flex;
  align-items: center;
  gap: 15px;
  flex-shrink: 0; 
  justify-content: flex-end; 
}

.burger {
  display: none;
}

.mobile-menu {
  display: none;
  flex-direction: column;
  gap: 15px;
  background: #DDA642;
  padding: 15px;
  width: 100%;
}


@media (min-width: 2560px) {
  .header {
    padding: 15px 400px;
  }

  .header__inner {
    max-width: 2000px;
    gap: 30px;
  }

  .header__logo {
    width: 120px;
    height: 120px;
  }

  .header__search input {
    max-width: 1400px;
    height: 50px;
    font-size: 18px;
  }

  .header__search button {
    height: 50px;
    width: 60px;
  }

  .header__nav a {
    font-size: 22px;
  }

  .header__icons img {
    width: 55px;
    height: 55px;
  }

  .header__status {
    font-size: 20px;
    padding: 8px 12px;
  }
}


@media (max-width: 900px) {
  .header {
    padding: 8px 20px;
  }

  .header__inner {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }

  .header__logo {
    width: 60px;
    height: 60px;
  }

  .header__search {
    width: 100%;
  }

  .header__search input {
    max-width: 100%;
    font-size: 14px;
    height: 32px;
  }

  .header__search button {
    height: 32px;
    width: 36px;
  }

  .header__nav {
    display: none;
  }

  .burger {
    display: block;
    width: 35px;
    cursor: pointer;
  }

  .mobile-menu.active {
    display: flex;
  }

  .mobile-icons img {
    width: 30px;
    height: 30px;
  }

  .header__status {
    display: none;
  }
}


@media (max-width: 450px) {
  .header__search input {
    max-width: 140px;
    font-size: 12px;
  }

  .header__icons img {
    width: 25px;
    height: 25px;
  }
}

</style>
