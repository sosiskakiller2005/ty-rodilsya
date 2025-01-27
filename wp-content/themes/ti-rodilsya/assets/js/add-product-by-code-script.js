document.body.addEventListener('click', function (event) {
    if (event.target && event.target.id === 'addCodeButton') {
    const code = document.getElementById('codeInput').value.trim();

    if (!code) {
        alert('Введите код!');
        return;
    }

    const formData = new FormData();
    formData.append('action', 'add_product_by_code');
    formData.append('code', code);
    // Отправляем запрос на сервер
    fetch('/wp-admin/admin-ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Товар добавлен в заказ!');
            } else {
                alert(data.message || 'Ошибка при добавлении товара.');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
            alert('Произошла ошибка. Попробуйте снова.');
        });
}});