## CodeIgniter 3 CRUD Application
- Цей проєкт є прикладом повноцінної CRUD-системи (Create, Read, Update, Delete), реалізованої на PHP з використанням CodeIgniter 3. 
- Проєкт має зручну структуру MVC, підтримку сесій та валідацію.

## Офіційне завантаження та документація
- Головна сторінка: https://codeigniter.com/userguide3/installation/downloads.html

## Що реалізовано

- **Архітектура MVC**
- **CRUD-операції**: створення, перегляд, оновлення та видалення користувачів
- **Валідація форм**: за допомогою CodeIgniter form_validation
- **Захищене збереження паролів**: з використанням password_hash
- **Менеджмент сесій**: дані зберігаються у сесії
- **View Handler**: для керування шаблонами
- **UI створений на базі шаблону AdminLTE**

### Технології

- PHP (7.4)
- CodeIgniter 3
- MySQL
- Bootstrap / AdminLTE
- Apache Server

### Структура проєкту

-  **controllers/**: Home - логін, реєстрація, вихід. Crud - оперції над користувачами
-  **libraries/**: CrudService - вся логіка збереження та оновлення даних 
-  **models/**: CrudRepository - робота з даними. DatabaseModel - робота за базою даних. ViewHandler - завантаження потрібних view
-  **helpers/**: validation_helper.php - правила валідації, активаціч form_validator


### Як розгорнути проєкт

1. **Клонувати репозиторій**:
   ```sh
   git clone https://github.com/kuzminskaliza/codeigniter3-education
   ```
   
2.  **Підняти контейнери**:
   ```sh
   make build
   ```

3. **Налаштувати підключення до Бази даних**:
   - Зайти в контейнер cli 
   ```sh
   make cli
   ```
   
4. **Перевірити підключення до бази даних**: 
   - /application/config/config.php

5. **Виконати міграції**:
   ```sh
   php index.php migrate/up
   ```

6. **Відкрити сторінку**:
   - http://codeigniter3.local:8080/index.php

