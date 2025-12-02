<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import { Cart } from "@/utils/cart";

export default {
  components: { Header, Footer },

  data() {
    return {
      items: []
    };
  },

  mounted() {
    this.load();
  },

  methods: {
    load() {
      this.items = Cart.get();
    },

    inc(title) {
      Cart.changeQty(title, 1);
      this.load();
    },

    dec(title) {
      Cart.changeQty(title, -1);
      this.load();
    },

    removeItem(title) {
      Cart.remove(title);
      this.load();
    }
  }
};
</script>

<template>
  <div class="cart-layout">

    <Header />

    <main class="cart-main">
      <div class="cart-box">
        
        <h1 class="cart-title">Корзина</h1>

        <!-- empty -->
        <div v-if="items.length === 0" class="cart-empty">
          <img src="/public/src/images/SleepCheburek.png" class="empty-img">
          <p class="empty-text">Здесь пока ничего нет…</p>
        </div>

        <!-- items -->
        <div v-else class="cart-list">

          <div
            class="cart-item"
            v-for="p in items"
            :key="p.title"
          >
            <div class="cart-info">
              <img :src="p.image" class="cart-img" />
              <div>
                <div class="cart-name">{{ p.title }}</div>
                <div class="cart-weight">{{ p.weight }} г</div>
              </div>
            </div>

            <div class="cart-controls">
              <button class="qty-btn" @click="dec(p.title)">−</button>
              <span class="qty">{{ p.qty }}</span>
              <button class="qty-btn" @click="inc(p.title)">+</button>
            </div>

            <div class="cart-price">{{ p.price * p.qty }} ₽</div>
          </div>

          <!-- total -->
          <div class="cart-bottom">
            <div class="cart-total">
              <span>Итого:</span>
              <span>{{ items.reduce((s,p)=>s+p.price*p.qty,0) }} ₽</span>
            </div>

            <!-- NEW: кнопка оформления -->
            <button class="checkout-btn">Оформить заказ</button>
          </div>

        </div>
      </div>
    </main>

    <Footer />

  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Ruslan+Display&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap');
@font-face {
  font-family: 'Roboto';
  src: url('/public/src/fonts/Roboto.ttf') format('ttf');
}
.cart-layout {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.cart-main {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 0;
}

.cart-box {
  width: 100%;
  max-width: 1200px;
  height: 100%;
  background: #DDA642;
  padding: 30px; /* единый отступ */
  border-radius: 22px;
}

/* Заголовок стал мягким */
.cart-title {
  font-family: 'Stalinist One', sans-serif;
  font-size: 38px;
  text-align: center;
  margin-top: -10px;
  margin-bottom: 10px;
  color: #000;
}

/* EMPTY BLOCK */
.cart-empty {
  background: #f7d9a7;
  padding: 40px; 
  border-radius: 18px;
  text-align: center;
  min-height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  box-sizing: border-box;
}


.empty-img {
  width: 150px;
}

.empty-text {
  font-size: 38px;
  font-family: 'Roboto', sans-serif;
}

/* LIST BOX — увеличены отступы */
.cart-list {
  background: #f7d9a7;
  padding: 30px;
  border-radius: 18px;
}

/* --- GRID ДЛЯ КАЖДОГО ТОВАРА --- */
.cart-item {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr 0.4fr; /* 3 колонки */
  align-items: center;
  background: #ffe8c7;
  padding: 18px;
  border-radius: 14px;
  margin-bottom: 18px;
  gap: 20px;
}

/* первая колонка — картинка + название */
.cart-info {
  display: grid;
  grid-template-columns: 85px 1fr;
  align-items: center;
  gap: 16px;
}

/* вторая колонка — кнопки +/− */
.cart-controls {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 12px;
}

/* третья колонка — цена */
.cart-price {
  font-size: 22px;
  font-weight: bold;
  text-align: right;
}

.cart-img {
  width: 85px;
  height: 85px;
  object-fit: contain;
}

.cart-name {
  font-family: 'Press Start 2P';
  font-size: 18px;
}

.cart-controls {
  display: flex;
  align-items: center;
  gap: 12px;
}

.qty-btn {
  background: #000;
  color: #DDA642;
  border: none;
  width: 36px;
  height: 36px;
  border-radius: 8px;
  font-size: 20px;
  cursor: pointer;
}

.qty {
  font-size: 18px;
}


/* блок итог + кнопка */
.cart-bottom {
  margin-top: 35px;
}

.cart-total {
  font-size: 26px;
  font-weight: bold;
  display: flex;
  justify-content: space-between;
  margin-bottom: 30px;
}

/* новая кнопка */
.checkout-btn {
  width: 100%;
  padding: 18px 0;
  font-size: 20px;
  font-family: 'Press Start 2P';
  background: #000;
  color: #DDA642;
  border: none;
  border-radius: 14px;
  cursor: pointer;
  transition: 0.15s;
}

.checkout-btn:hover {
  background: #2c2c2c;
}
</style>

