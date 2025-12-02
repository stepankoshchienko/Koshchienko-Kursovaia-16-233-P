<template>
    <footer class="footer">
        <div class="footer-container">

                <!-- Контакты -->
            <div class="footer-column">
                <div class="contact-row">
                    <p><strong>Телефон:<br></strong> +7(904) 625-98-55</p>
                    <p><strong>e-mail:<br></strong> cheburek0k@gmail.com</p>
                </div>
                <p><strong>Адрес главного офиса:</strong><br> г. Владивосток ул. Сабанеева д. 25</p>
                <p><strong>Время работы доставки:</strong><br> Круглосуточно</p>
            </div>

            <!-- Навигация -->
            <div class="footer-column">
                <p><strong>Навигация</strong></p>
                <ul>
                    <li><a href="#about">О нас</a></li>
                    <li><a href="#popular">Популярное</a></li>
                    <li><a href="#menu">Меню</a></li>
                    <li><a href="#reviews">Отзывы</a></li>
                </ul>
            </div>

            <!-- Компания -->
            <div class="footer-column">
                <p><strong>Компания:</strong></p>
                <ul>
                    <li><a href="/vacancies">Вакансии</a></li>
                    <li><a href="/terms">Условия использования</a></li>
                    <li><a href="/privacy">Политики конфиденциальности</a></li>
                </ul>
            </div>

            <!-- Соцсети -->
            <div class="footer-socials">
                <a href="https://t.me/cheburek_ok"><img src="/public/src/icons/Telegram.svg" alt="Telegram" /></a>
                <a href="https://vk.com/club234353978"><img src="/public/src/icons/VK.svg" alt="VK" class="vk"/></a>
            </div>

        </div>
    </footer>
</template>

<script>
export default {
  name: "Footer",
}
</script>

<style scoped>
.footer {
  background: #D9A63A;
  padding: 20px 265px;
  font-family: 'Roboto', sans-serif;
  color: #000;

}

.footer-container {
  max-width: 1670px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr auto;
  align-items: flex-start;
  gap: 40px;
}

.footer-column p {
  margin-bottom: 12px;
  line-height: 1.5;
  font-size: 18px;
}

.footer-column strong {
  font-weight: bold;
}

.footer-column ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-column li {
  margin-bottom: 6px;
}

.footer-column a {
  text-decoration: none;
  color: #3d3d3d;
  font-size: 18px;
  transition: 0.3s;
}

.contact-row {
  display: flex;
  flex-direction: row; 
  align-items: flex-start;
  gap: 50px; 
}

.contact-row p {
  margin: 0;
  font-size: 18px;
  line-height: 1.5;
}

.footer-column a:hover {
  color: #fff;
}

.footer-socials {
  display: flex;
  gap: 14px;
  align-items: center;
}

.footer-socials img {
  width: 45px;
  height: 45px;
  border-radius: 6px;
  padding: 4px;
  transition: 0.3s;
}

.footer-socials .vk {
    width: 50px;
    height: 50px;
}


/* Адаптивность */
@media (max-width: 900px) {
  .footer {
    padding: 40px 20px;
  }

  .footer-container {
    grid-template-columns: 1fr;
    gap: 20px;
    text-align: center;
  }

  .footer-socials {
    justify-content: center;
  }
}
</style>