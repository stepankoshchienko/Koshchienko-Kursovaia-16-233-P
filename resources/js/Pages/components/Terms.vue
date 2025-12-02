<template>
    <Header />
  <div class="page">
    <h1>Условия использования</h1>

    <p>Используя наш сайт, вы соглашаетесь с приведёнными ниже условиями.</p>

    <h2>1. Общие положения</h2>
    <p>Мы предоставляем доступ к каталогу товаров и возможности оформления заказа.</p>

    <h2>2. Ответственность</h2>
    <p>Мы стараемся предоставлять актуальную и точную информацию, но не гарантируем отсутствие ошибок.</p>

    <h2>3. Заказы</h2>
    <p>Оформляя заказ, вы подтверждаете правильность введённых данных.</p>

    <h2>4. Изменения условий</h2>
    <p>Мы можем обновлять эти условия без отдельного уведомления.</p>
  </div>
  <Footer />
</template>

<script >
import Footer from "./Footer.vue";
import Header from "./Header.vue";
export default {
  components: { Header, Footer },
};
</script>

<style scoped>
.page {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  max-width: 900px;
  margin: 0 auto;
  padding: 40px;
  font-size: 19px;
}
</style>
