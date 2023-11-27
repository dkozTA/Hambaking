<?php include('front/menu.php'); ?>



    <section class="contact-page">

        <div class="contact-container">
            <h1>Liên hệ HamBaking</h1>
            <form id="contact-form" action="#" method="post">
            <input type="text" id="name" name="name" placeholder="Tên" required>
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            <input type="phone" id="phone" name="phone" placeholder="Số điện thoại" required>
            <textarea rows="6" placeholder="Lời nhắn gửi" id="message" name="message" required></textarea>
            <button class="btn" type="submit" id="submit" name="submit">GỬI</button>
      </form>
        </div>

    </section>

    </main>


<?php include('front/footer.php'); ?>