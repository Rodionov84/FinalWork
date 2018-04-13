<form method="get" action="/new_question">
    <input class="cd-faq-question" type="text" name="user_name" value="" placeholder="Имя" required>
    <input class="cd-faq-question" type="email" name="user_email" value="" placeholder="Email" required>
    <select class="cd-faq-question-2" name="category_id"  required>
        <option value="0" >-Тема обращения-</option>
        @include('add_question.category_options')
    </select><br>
    <textarea class="cd-faq-question-1" name="question" placeholder="Ваш вопрос" required></textarea>
    <input class="cd-faq-question" type="submit" value="Задать вопрос">
</form>