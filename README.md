# 🏋️ Workout Appointer

**Workout Appointer** es una aplicación móvil desarrollada en React Native con un backend en Laravel. El objetivo es permitir a los usuarios crear y gestionar entrenamientos personalizados según sus objetivos y características físicas.

---

## 📱 Características principales

- Registro de usuarios con meta de entrenamiento (fuerza, definición…)
- Catálogo de ejercicios por grupo muscular y tipo
- Generación dinámica de entrenamientos personalizados
- Consulta de entrenamientos desde la app o desde una web
- API RESTful con Laravel para gestionar usuarios y ejercicios

---

## 🧱 Tecnologías utilizadas

### 🔹 Frontend (App móvil)
- [React Native](https://reactnative.dev/) con [Expo](https://expo.dev/)
- TypeScript y componentes reutilizables
- Almacenamiento local por ahora (más adelante con backend)

### 🔹 Backend (API)
- [Laravel 11](https://laravel.com/) (PHP)
- Base de datos MySQL gestionada con phpMyAdmin (vía XAMPP)
- Rutas definidas (temporalmente) en `web.php`
- Modelo `Ejercicio` con filtros por tipo y grupo muscular

---

## 🗂 Estructura del proyecto

```
workout-appointer/
├── app/                # App React Native (Expo)
├── api/                # Laravel API
│   ├── app/Models/Ejercicio.php
│   ├── app/Http/Controllers/ExerciseController.php
│   ├── routes/web.php (rutas API temporales)
├── README.md
```

---

## 🚀 Cómo iniciar el proyecto

### 📲 App (Expo)

```bash
cd workout-appointer
npm install
npx expo start
```

Escanea el QR desde la Expo Go App (Android/iOS)

---

### 🛠 API (Laravel)

```bash
cd api
composer install
cp .env.example .env
php artisan key:generate
# Configura .env con tus datos MySQL
php artisan migrate --seed
php artisan serve
```

Luego accede a:
```
http://localhost:8000/api/ejercicios
```

---

## 📌 Próximos pasos

- Añadir rutas de registro/login de usuarios
- Conectar app móvil con API vía fetch/axios
- Almacenar entrenamientos personalizados por usuario
- Mover rutas definitivas a `routes/api.php`

---

## ✨ Autor

**Rubén Arcos Colchero**  
TFG - Desarrollo de una app de Desarrollo de aplicaciones Multiplataforma  
2º DAM - IES Torre del Rey (Pilas) 
