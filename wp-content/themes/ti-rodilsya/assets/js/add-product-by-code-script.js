document.addEventListener('click', function (event) {
    if (event.target.classList.contains('add-code-button')) {
    const code = document.querySelector('.add-code-input').value.trim();

    if (!code) {
        alert('Введите код!');
        return;
    }

    let formData = new FormData();
    formData.append('action', 'add_product_by_code'); // Важно! WordPress ждет этот параметр
    formData.append('code', code);

    fetch('/wp-admin/admin-ajax.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Ответ сервера:', data);
        if (data.success) {
            alert('Товар добавлен в заказ!');
            location.reload();
        } else {
            alert(data.message || 'Ошибка при добавлении товара.');
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Произошла ошибка. Попробуйте снова.');
    });
}});
