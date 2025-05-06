## CodeIgniter 3 CRUD Application
- Цей проєкт є прикладом повноцінної CRUD-системи (Create, Read, Update, Delete), реалізованої на PHP з використанням CodeIgniter 3. 
- Проєкт має зручну структуру MVC, підтримку сесій та валідацію.

## Офіційне завантаження та документація
- Головна сторінка: https://codeigniter.com/userguide3/general/welcome.html

## Що реалізовано

- **Архітектура MVC**
- **CRUD-операції**: створення, перегляд, оновлення та видалення користувачів
- **Валідація форм**: за допомогою CodeIgniter form_validation
- **Захищене збереження паролів**: з використанням password_hash
- **Менеджмент сесій**: дані зберігаються у сесії
- **View Handler**: для керування шаблонами
- **UI створений на базі шаблону AdminLTE**

### Технології

- PHP 7.3
- CodeIgniter 3
- MySQL 5.7
- Bootstrap / AdminLTE
- Apache Server
- Xdebug 2.9.6

### Структура проєкту

-  **controllers/**: Home - логін, реєстрація, вихід. Crud - оперції над користувачами
-  **libraries/**: CrudService - вся логіка збереження та оновлення даних 
-  **models/**: CrudRepository - робота з даними. DatabaseModel - робота за базою даних. ViewHandler - завантаження потрібних view
-  **helpers/**: validation_helper.php - правила валідації, активаціч form_validator


### Як розгорнути проєкт

1. **Перевірити підключення до бази даних**:
   - /application/config/config.php
   - 
2. **Запустити проєкт однією командою**:
   ```sh
   make init
   ```
#### Ця команда:
- Клонує репозиторій
- Піднімає контейнери з нуля
- Встановлює залежності через Composer
- Накочує міграції

3. **Відкрити хости**
   ```sh
   sudo pluma /etc/hosts
   ```
   - Вказати ось це: 127.0.0.1 codeigniter3.local

4. **Відкрити сторінку**:
   - http://codeigniter3.local:8080/index.php

