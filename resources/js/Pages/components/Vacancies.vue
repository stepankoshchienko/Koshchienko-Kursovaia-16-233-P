<template>
    <Header />
  <div class="page">
    <h1>Вакансии</h1>

    <p>На данный момент мы ищем людей, которые хотят стать частью нашей команды.</p>

    <h2>Открытые позиции</h2>

    <ul>
      <li><b>Повар</b> — полный день, опыт приветствуется</li>
      <li><b>Курьер</b> — частичная занятость, свой транспорт</li>
      <li><b>Администратор</b> — работа с клиентами, график 2/2</li>
    </ul>

    <p>Если хотите присоединиться — напишите нам:  
      <br><b>Email:</b> job@cheburek.ru
    </p>
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
h1 { margin-bottom: 20px; }
</style>
