<template>
    <Header />

      <!-- HERO -->
    <main class="hero">
      <div class="container">
        <div class="text-block">
          <h1>
            ЧЕБУРЕКИ <br />
            ДЛЯ ВСЕЙ СЕМЬИ
          </h1>

          <button class="order-btn">Оформить заказ</button>
        </div>

          <!-- Иконка чебурека -->
        <div class="cheburek-img">
          <img src="/public/src/images/Cheburek.png" alt="Чебурек">
        </div>
      </div>
    </main>

      <!-- ABOUT SECTION -->
    <section class="about">
      <!-- Заголовок над всем блоком -->
      <h2 class="about-title">О НАС</h2>

      <div class="about-block">

          <!-- Фото слева -->
        <div class="about-photo">
          <img src="/public/src/images/AboutUs.png" alt="О нас">
        </div>

          <!-- Текст справа -->
        <div class="about-text">
          <h3>НАША ФИЛОСОФИЯ</h3>
          <h3 class="double-title">В ОДНОМ ЧЕБУРЕКЕ</h3>

          <p>
            Для нас чебурек — это больше чем просто еда. Это история, которую
            хочется рассказать каждому гостю. С самого начала мы храним верность
            старинному рецепту: мы вручную замешиваем эластичное, нежное тесто
            и готовим сочную, ароматную начинку из отборного мяса и правильных специй.

            Но главный наш секрет — это страсть. Страсть к тому, чтобы вы откусили
            хрустящую золотистую корочку и почувствовали тот самый, неповторимый вкус
            детства, праздника или поездки к морю. Мы верим, что настоящий чебурек
            объединяет людей, и каждый наш день начинается с одной цели — 
            подарить вам это простое и такое искреннее удовольствие.
          </p>
        </div>

      </div>
    </section>
    <section id="items">
      <div class="popular-section">
        <h2 class="section-title">Популярные сейчас</h2>
        <div class="cards">
          <div class="card" v-for="(item, i) in items" :key="i">
            <div class="image-wrapper">
              <img :src="item.image" :alt="item.title" />
            </div>
            <div class="info">
              <div class="title">{{ item.title }}</div>
              <div class="price-weight">
                <span class="price">{{ item.price }}₽</span>
                <span class="weight">вес {{ item.weight }}г</span>
              </div>
            <button class="cart-btn" @click="addToCart(item)">В корзину</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- MENU BLOCK (NEW) -->
    <section class="menu-block" id="menu">
      <div class="menu-header">
        <h2 class="menu-title">Наше меню</h2>

        <div class="menu-buttons">
          <button :class="['menu-btn', activeCategory==='meat' ? 'active' : '']" @click="activeCategory='meat'">Мясные</button>
          <button :class="['menu-btn', activeCategory==='sweet' ? 'active' : '']" @click="activeCategory='sweet'">Сладкие</button>
          <button :class="['menu-btn', activeCategory==='addons' ? 'active' : '']" @click="activeCategory='addons'">С добавками</button>
        </div>
      </div>

      <transition name="fade" mode="out-in">
        <div class="menu-cards" :key="activeCategory">
          <div class="card" v-for="item in filteredMenu" :key="item.title">
            <div class="image-wrapper">
              <img :src="item.image" :alt="item.title" />
            </div>
            <div class="info">
              <div class="title">{{ item.title }}</div>
              <div class="price-weight">
                <span class="price">{{ item.price }}₽</span>
                <span class="weight">вес {{ item.weight }}г</span>
              </div>
              <button class="cart-btn" @click="addToCart(item)">В корзину</button>
            </div>
          </div>
        </div>
      </transition>
    </section>


    <section class="reviews-section" id="reviews">
      <h2 class="reviews-title">Отзывы</h2>

      <div class="review-item">
        <div class="review-stars">★★★★★</div>
        <div class="review-name">Анна, Москва</div>
        <div class="review-text">
          Заказала чебуреки впервые — теперь подсела! Тесто хрустящее, мясо сочное,
          доставили горячими. Даже не ожидала, что онлайн-чебуреки могут быть такими вкусными.
          Уже оформила второй заказ на обед всей семье.
        </div>
      </div>
      
      <div class="reviews-down">
        <div class="review-item">
          <div class="review-stars">★★★★★</div>
          <div class="review-name">Игорь, Санкт-Петербург</div>
          <div class="review-text">
            Быстро, удобно, привезли за 35 минут. Всё в термопакете. Хотелось бы
            больше соуса, но сами чебуреки отличные — особенно понравился с сыром и ветчиной.
          </div>
        </div>

        <div class="review-item">
          <div class="review-stars">★★★★☆</div>
          <div class="review-name">Виталий, Владивосток</div>
          <div class="review-text">
            Прям вкус детства! Хрустят, как на ярмарке, но без очередей. Спасибо за быструю доставку
            и аккуратную упаковку — ничего не промокло.
          </div>
        </div>
      </div>
    </section>

    <Footer />
</template>

<script>
import Footer from "./components/Footer.vue";
import Header from "./components/Header.vue";
import { Cart } from "../utils/cart";

export default {
  components: { Header, Footer },
  name: "FullPageChebureki",
  methods: {
    addToCart(item) {
      Cart.add(item);
    }
  },

  data() {
    return {
      items: [
        { title: "С тыквой", price: 120, weight: 130, image: "/src/images/pumpkin.png" },
        { title: "По корейски", price: 130, weight: 180, image: "/src/images/korean.png" },
        { title: "Свинина-Говядина", price: 180, weight: 200, image: "/src/images/meat.png" },
        { title: "Салями", price: 150, weight: 140, image: "/src/images/salami.png" }
      ],


      activeCategory: "meat",


      menu: [
        { title: "По корейски", price: 130, weight: 180, category: "meat", image: "/src/images/korean.png" },
        { title: "Свинина-Говядина", price: 180, weight: 200, category: "meat", image: "/src/images/meat.png" },
        { title: "Говядина", price: 180, weight: 180, category: "meat", image: "/src/images/Cow.png" },
        { title: "Курица-Сыр", price: 130, weight: 180, category: "meat", image: "/src/images/ChickenChesee.png" },
        { title: "Охотничий", price: 130, weight: 170, category: "meat", image: "/src/images/Hunter.png" },
        { title: "Курица-Картофель", price: 200, weight: 180, category: "meat", image: "/src/images/ChickenPotato.png" },
        { title: "Ветчина-Сыр", price: 155, weight: 160, category: "meat", image: "/src/images/HamChesee.png" },
        { title: "Салями", price: 150, weight: 140, category: "meat", image: "/src/images/salami.png" },
        { title: "С тыквой", price: 120, weight: 130, category: "addons", image: "/src/images/pumpkin.png" },
        { title: "Моцарелла", price: 110, weight: 130, category: "addons", image: "/src/images/Mozzarella.png" },
        { title: "Жюльен", price: 200, weight: 150, category: "addons", image: "/src/images/Shulien.png" },
        { title: "Картофель", price: 130, weight: 130, category: "addons", image: "/src/images/Potato.png" },
        { title: "Яблоко-Корица", price: 200, weight: 150, category: "sweet", image: "/src/images/Apple.png" },
        { title: "Банан-Шоколад", price: 220, weight: 170, category: "sweet", image: "/src/images/BananaChocolate.png" },
        { title: "Клубника-Банан", price: 210, weight: 190, category: "sweet", image: "/src/images/BananaStrawberry.png" },
        { title: "Клубника", price: 190, weight: 185, category: "sweet", image: "/src/images/Strawberry.png" },
      ],
    };
  },


  computed: {
    filteredMenu() {
      return this.menu.filter(m => m.category === this.activeCategory);
    }
  }
};

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Ruslan+Display&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap');
@font-face {
  font-family: 'Roboto';
  src: url('/public/src/fonts/Roboto.ttf') format('ttf');
}


/* ---------------------- MAIN WRAPPER ---------------------- */
.container {
  max-width: 1670px;
  margin: 0 auto;
  padding: 0 265px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* ---------------------- HERO ---------------------- */
.hero {
  background: url('/public/src/images/Background.png') center / cover no-repeat;
  box-shadow: 0px 50px 90px #cccccc;
  padding: 80px 0;
  min-height: 450px;
  font-family: 'Stalinist One', sans-serif;
  position: relative;
}

.text-block h1 {
  margin-top: 200px;
  font-size: 42px;
  color: white;
  font-weight: 900;
  line-height: 1.2;
}

.order-btn {
  font-family: 'Roboto', sans-serif;
  margin-top: 25px;
  background: #D9A63A;
  padding: 12px 32px;
  font-weight: bold;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 18px;
}
.order-btn:hover {
    background: #d8b66d; 
    transition: 0.25s ease;
}

.cheburek-img img {
  min-width: 682px;
  max-height: 682px;
  position: absolute;
  right: 100px;
  top: 0px;
}

/* ---------------------- ABOUT ---------------------- */
.about {
  padding: 200px 0;
}

.about-block {
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  gap: 50px;
  max-width: 1670px;
  margin: 0 auto;
  padding: 0px 265px;
}

.double-title {
  margin-left: 180px;
}

.about-photo img {
  width: 100%;
  border-radius: 6px;
  display: block;
}

.about-title {
  font-size: 54px;
  font-family: 'Stalinist One', sans-serif;
  text-align: center;
  margin-bottom: 16px;
}

.about-text h3 {
  font-family: 'Ruslan Display', sans-serif;
  font-size: 54px;
  font-weight: 900;
  color: #D9A63A;
  -webkit-text-stroke: 1px #000;
}

.about-text p {
  font-family: 'Roboto', sans-serif;
  font-size: 26px;
  line-height: 1.65;
}

/* ---------------------- POPULAR ---------------------- */
.popular-section {
  background: url('../../../public/src/images/Background.png') center / cover no-repeat;
  padding: 40px 0;
  box-shadow: 
    0px -30px 60px #cccccc, 
    0px 30px 60px #cccccc;
  margin-bottom: 100px;
}

.popular-section h2 {
  padding: 0 265px;
  text-align: left;
}

.section-title {
  color: #ffffff;
  font-family: 'Stalinist One';
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 20px;
  text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
}

.cards {
  max-width: 1670px;
  margin: 0 auto;
  padding: 0 265px;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 14px;
}

.card {
  background: #DDA642;
  width: 245px;
  height: 378px;
  border-radius: 15px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: scale(1.05); 
  box-shadow: 0 15px 30px rgba(0,0,0,0.3); 
}

.image-wrapper {
  width: 100%;
  height: 100%;
  border-radius: 15px;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.info {
  width: 100%;
  text-align: left;
  margin-top: 10px;
}

.title {
  font-family: 'Stalinist One';
  font-size: 20px;
}

.price-weight {
  display: flex;
  align-items: center;     
  justify-content: flex-start;
  gap: 4px;
}

.price {
  font-weight: bold;
  font-size: 30px;
  line-height: 1;          
}

.weight {
  font-size: 14px;
  opacity: 0.85;
  margin-left: 6px;        
  transform: translateY(2px); 
}

.cart-btn {
  width: 100%;
  margin-top: 12px;
  background: #000;
  color: #DDA642;
  border: none;
  border-radius: 8px;
  padding: 15px 0;
  font-family: 'Stalinist One';
  font-size: 20px;
  cursor: pointer;
}


/* ---------------------- MENU ---------------------- */


.menu-block {
  padding: 150px 0 80px;
  max-width: 1670px;
  margin: 0 auto;
  padding-left: 265px;
  padding-right: 265px;
}

.menu-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 45px; 
}

.menu-title {
  font-family: 'Stalinist One';
  font-size: 48px;
}

.menu-buttons {
  display: flex;
  gap: 14px;
  justify-content: flex-end;
}

.menu-btn {
  background: #DEA743;
  border: 4px solid #C68A1F;
  border-radius: 12px;
  padding: 10px 26px;
  font-family: 'Ruslan Display';
  font-size: 26px;
  cursor: pointer;
  box-shadow: 0 4px 0 #C68A1F;
}

.menu-btn.active {
  background: #F4E2C1;
  color: #000000;
}

/* === сетка меню (4 в ряд) === */
.menu-cards {
  max-width: 1670px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 14px;
  min-height: 400px;
}

.menu-cards .card {
  background: #DDA642;
  width: 245px;
  height: 378px;
  border-radius: 15px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
}


.fade-enter-active, .fade-leave-active {
  transition:all 0.4s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
.fade-enter-to, .fade-leave-from {
  opacity: 1;
}

/* ---------------------- REVIEWS ---------------------- */
.reviews-down{
  display: flex;
  flex-direction: row;
  gap: 20px;
}

.reviews-section {
  max-width: 1670px;
  margin: 0 auto;
  padding: 0 265px;
  margin-bottom: 120px;
}

.reviews-title {
  font-family: 'Stalinist One', sans-serif;
  font-size: 42px;
  margin-bottom: 20px;
}

.review-item {
  background: #FFE4B2;
  border: 3px solid #C68A1F;
  border-radius: 25px;
  padding: 25px 35px;
  margin-bottom: 25px;
  position: relative;
  box-shadow: inset 0 0 0 6px #DDB167;
}

.review-stars {
  font-size: 28px;
  color: black;
  margin-bottom: 10px;
}

.review-name {
  font-family: 'Roboto', sans-serif;
  font-size: 22px;
  margin-bottom: 10px;
}

.review-text {
  font-family: 'Roboto', sans-serif;
  font-size: 22px;
  line-height: 1.5;
}


@media (min-width: 2560px) {
  .container, .about-block {
    max-width: 2100px;
    padding: 0 400px; /* больше отступы слева/справа */
  }

  .text-block h1 {
    font-size: 60px;
    margin-top: 250px;
  }

  .cheburek-img img {
    min-width: 900px;
    max-height: 900px;
    right: 200px;
    top: 0;
  }

  .about-title {
    font-size: 70px;
    margin-bottom: 24px;
  }

  .about-text h3 {
    font-size: 64px;
  }

  .about-text p {
    font-size: 30px;
  }
}

/* === Малые экраны (<= 900px) === */
@media (max-width: 900px) {
  .container, .about-block {
    flex-direction: column;
    padding: 0 20px;
  }

  .text-block h1 {
    font-size: 32px;
    margin-top: 100px;
    text-align: center;
  }

  .cheburek-img img {
    position: relative;
    min-width: 100%;
    max-width: 400px;
    height: auto;
    margin: 20px auto 0;
    right: 0;
    top: 0;
  }

  .about-block {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  .about-title {
    font-size: 36px;
    text-align: center;
  }

  .about-text h3 {
    font-size: 32px;
    text-align: center;
  }

  .about-text p {
    font-size: 18px;
    text-align: center;
  }

  .double-title {
    margin-top: 0;
    margin-left: 0;
  }
}
</style>
