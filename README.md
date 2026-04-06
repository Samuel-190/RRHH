# Sistema de Gestión de RRHH

Proyecto backend desarrollado para **Tech Solutions SAS** que permite gestionar la información de colaboradores y el ciclo de vida de sus contratos dentro de la empresa. El sistema automatiza procesos del área de Recursos Humanos como la creación de colaboradores, gestión de contratos, prórrogas y terminaciones.
Su objetivo es centralizar y automatizar la gestión de contratos de los colaboradores, permitiendo mantener la información organizada, segura y validada mediante pruebas automatizadas.

---

# 📈 Metodología de Desarrollo

El proyecto se desarrolla utilizando **Test Driven Development (TDD)**.

Flujo de trabajo:

1. Escribir una prueba que falle
2. Escribir el código necesario para que la prueba pase
3. Refactorizar el código manteniendo las pruebas funcionando

Esto permite asegurar que la lógica del sistema funcione correctamente.

---

# 📍 Funcionalidades Principales

El proyecto esta compuesto principalmente por 4 mudulos, cada uno hace algo diferente y coexisten entre si:

### 1 MUD- Gestión de Colaboradores

Permite crear, actualizar y desactivar perfiles de colaboradores.

### 2 MUD- Gestión de Contratos

Permite registrar y administrar los contratos asociados a cada colaborador.

### 3 MUD- Gestión de Prórrogas

Permite extender la duración de contratos existentes.

### 4 MUD- Terminación de Contratos

Permite finalizar contratos antes de su fecha de vencimiento.

---

# 👤 Roles del Sistema

Este proyecto maneja el paquete de laravel **spatie/laravel-permission**, con el objetivo de manejar permisos y protejer ciertas fucniones de la app para mayor seguridad de la informacion:

| Rol         | Permisos                                                       |
| ----------- | -------------------------------------------------------------- |
| Gestor RRHH | Gestión de colaboradores, contratos, prórrogas y terminaciones |

---

# 🔌 Stack Tecnológico

* **Backend:** Laravel 11
* **Base de Datos:** MySQL 8+
* **Pruebas:** PHPUnit
* **Gestión de permisos:** spatie/laravel-permission
* **Servidor Web:** Nginx / Apache

---

# ✏️ Control de Versiones

El proyecto utiliza **Git** para el control de versiones, sigue el modelo de trabajo **Git Flow** para organizar el desarrollo.

## Estructura de Ramas

* **main**
  Contiene el código estable listo para producción.

* **develop**
  Rama principal de desarrollo donde se integran las nuevas funcionalidades antes de pasar a producción.

* **feature/***
  Ramas utilizadas para desarrollar nuevas funcionalidades del sistema.

Este flujo permite mantener el código organizado y separar claramente el desarrollo de la versión estable del sistema.

---

# 🧪 Casos de Prueba

Este proyecto cuenta con un conjunto de casos de prueba diseñados para validar el correcto funcionamiento de los módulos principales del sistema, puedes usarlos como guia para ejecutar los test de forma correcta.

### Módulos cubiertos
- Módulo de Colaboradores
- Módulo de Contratos
- Módulo de Prórrogas

### Puedes consultar el detalle completo en:
- [Casos de prueba - Colaboradores](./casos_de_prueba/casos_collaborators.md)
- [Casos de prueba - Contratos](./casos_de_prueba/casos_contratos.md)
- [Casos de prueba - Prórrogas](./casos_de_prueba/casos_prorrogas.md)

---

# ▶️ Ejecutar Pruebas

Para ejecutar los test del sistema:

```bash
php artisan test
```

---

# 🗒️ Notas

Este proyecto se enfoca únicamente en la **lógica de negocio del backend** y el desarrollo guiado por pruebas (TDD), sin incluir interfaz gráfica.
