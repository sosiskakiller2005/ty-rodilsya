document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".cart");

    if (!form) {
        console.error("Форма .cart не найдена!");
        return;
    }

    form.addEventListener("submit", async function (event) {
        event.preventDefault(); // Отменяем стандартную отправку формы

        const formData = new FormData(form);
        formData.append("action", "send_email_action");

        try {
            const response = await fetch("/wp-admin/admin-ajax.php", {
                method: "POST",
                body: formData,
            });

            if (!response.ok) {
                throw new Error(`Ошибка HTTP: ${response.status}`);
            }

            const data = await response.text(); // Ожидаем JSON-ответ от сервера

            if (data.includes("Письмо успешно отправлено!")) {
                alert("✅ Покупка успешно оформлена!");
                document.getElementById("response-message").innerText = data.message || "Покупка оформлена!";
            } else {
                throw new Error(data.message || "Неизвестная ошибка");
                alert("❌ Ошибка при оформлении покупки. Попробуйте снова.");
            }
        } catch (error) {
            console.error("Ошибка запроса:", error);
            
        }
    });
});
