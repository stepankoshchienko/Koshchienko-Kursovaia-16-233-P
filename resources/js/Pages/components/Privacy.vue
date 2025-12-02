<template>
    <Header />
  <div class="page">
    <h1>Политика конфиденциальности</h1>

    <p>Мы уважаем вашу конфиденциальность и защищаем личные данные.</p>

    <h2>Какие данные мы собираем</h2>
    <p>
      — Имя, телефон и данные заказа  
      — Информация, которую вы оставляете при покупке  
    </p>

    <h2>Как мы используем данные</h2>
    <p>
      — Для обработки заказов  
      — Для связи с вами по вопросам доставки  
    </p>

    <h2>Передача третьим лицам</h2>
    <p>Мы не передаём данные третьим сторонам, кроме служб доставки.</p>

    <h2>Удаление данных</h2>
    <p>Вы можете запросить удаление своих данных, написав нам на email.</p>

    <p><b>Email для связи:</b> support@cheburek.ru</p>
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
