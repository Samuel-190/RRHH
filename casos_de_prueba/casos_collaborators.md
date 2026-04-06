# Casos de Prueba - Módulo de Colaboradores

---

## CP-REG-001

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-001 |
| Titulo de prueba         | Creación de colaborador |
| Modulo / Caracteristicas | Módulo colaborador |
| Descripción              | Esta prueba verifica que un nuevo colaborador pueda crearse exitosamente en el sistema |
| Precondiciones           | 1. Usuario registrado <br> 2. Documento del colaborador no existente en la DB <br> 3. El colaborador no debe ser menor de edad |
| Pasos para la ejecución  | 1. El usuario debe estar logueado <br> 2. Ir al módulo de colaboradores <br> 3. Rellenar los campos requeridos en el formulario <br> 4. Crear el nuevo colaborador |
| Datos de entrada         | Primer nombre: Daniel <br> Apellido: Torres <br> Tipo de documento: CC <br> Número de documento: 1784930 <br> Fecha de nacimiento: 01/11/2025 <br> Email: dani1234@gmail.com <br> Número de teléfono: 3245687907 |
| Resultado esperado       | 1. El sistema crea un nuevo colaborador en la tabla "collaborators" <br> 2. El colaborador queda guardado en el sistema |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-002

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-002 |
| Titulo de prueba         | Rechazar la creación de un colaborador con un número de documento duplicado |
| Modulo / Caracteristicas | Creación de colaborador |
| Descripción              | Esta prueba verifica que un colaborador no se podrá crear si su número de documento ya existe en la base de datos |
| Precondiciones           | 1. Usuario registrado <br> 2. Documento del colaborador ya existente en la DB |
| Pasos para la ejecución  | 1. El usuario debe estar logueado <br> 2. Ir al módulo de colaboradores <br> 3. Rellenar los campos requeridos en el formulario <br> 4. Crear el nuevo colaborador |
| Datos de entrada         | Primer nombre: Maria <br> Apellido: Restrepo <br> Tipo de documento: CC <br> Número de documento: (igual a otro documento) <br> Fecha de nacimiento: 08/23/2025 <br> Email: maria6214@gmail.com <br> Número de teléfono: 3245684501 |
| Resultado esperado       | 1. El sistema rechaza la creación del colaborador <br> 2. El colaborador NO queda guardado en el sistema |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-003

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-003 |
| Titulo de prueba         | Actualizar la información de un colaborador existente |
| Modulo / Caracteristicas | Colaborador existente |
| Descripción              | Esta prueba verifica que la información de un colaborador puede ser actualizada |
| Precondiciones           | 1. Usuario registrado <br> 2. Documento del colaborador ya existente en la DB |
| Pasos para la ejecución  | 1. El usuario debe estar logueado <br> 2. Ir al módulo de colaboradores <br> 3. Seleccionar un colaborador existente <br> 4. Rellenar los campos requeridos <br> 5. Actualizar los datos del colaborador |
| Datos de entrada         | Colaborador: Maria Restrepo <br> Actualizar: <br> Número de teléfono: 3478961209 <br> Email: mariarestrepo12@gmail.com |
| Resultado esperado       | 1. El sistema actualiza los datos del colaborador <br> 2. Los cambios quedan guardados en el sistema |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-004

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-004 |
| Titulo de prueba         | Obtener el listado de todos los colaboradores |
| Modulo / Caracteristicas | Colaboradores |
| Descripción              | Esta prueba verifica que el listado de colaboradores se obtiene correctamente |
| Precondiciones           | 1. Usuario registrado <br> 2. Documento del usuario ya existente en la DB |
| Pasos para la ejecución  | 1. El usuario debe estar logueado <br> 2. Ir al módulo de colaboradores <br> 3. Consultar la lista de colaboradores |
| Datos de entrada         | No hay datos |
| Resultado esperado       | 1. El sistema entrega la lista de colaboradores exitosamente |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-005

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-005 |
| Titulo de prueba         | Eliminar (o desactivar mediante soft-delete) un colaborador |
| Modulo / Caracteristicas | Colaboradores |
| Descripción              | Esta prueba verifica que un colaborador puede ser eliminado o desactivado |
| Precondiciones           | 1. Usuario registrado <br> 2. Documento del colaborador ya existente en la DB |
| Pasos para la ejecución  | 1. El usuario debe estar logueado <br> 2. Ir al módulo de colaboradores <br> 3. Seleccionar un colaborador existente <br> 4. Ejecutar la acción de eliminación o desactivación |
| Datos de entrada         | Colaborador: Maria Restrepo |
| Resultado esperado       | 1. El colaborador es eliminado o desactivado correctamente <br> 2. No aparece en el listado activo (si aplica soft-delete) |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---