# Casos de Prueba - Módulo de Contratos

---

## CP-REG-001

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-001 |
| Titulo de prueba         | Creación de contrato y asociarlo a un colaborador existente |
| Modulo / Caracteristicas | Módulo contratos |
| Descripción              | Esta prueba verifica que un nuevo contrato pueda crearse exitosamente en el sistema y ser asociado a un colaborador |
| Precondiciones           | 1. Usuario registrado <br> 2. Colaborador existente en la DB |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo de contratos <br> 3. Completar el formulario con los datos requeridos para el contrato <br> 4. Seleccionar un colaborador existente para asociar <br> 5. Enviar el formulario para crear el contrato <br> 6. Confirmar que el contrato se ha creado correctamente |
| Datos de entrada         | collaborator_id: (ID existente) <br> contract_type: Fijo <br> start_date: 2026-03-01 <br> end_date: 2027-02-10 <br> position: Desarrollador de Software <br> salary: 3500.00 <br> status: Activo |
| Resultado esperado       | 1. El sistema crea un nuevo contrato en la tabla contracts con los datos ingresados <br> 2. El contrato está asociado al colaborador existente <br> 3. El estado del contrato es "Activo" |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-002

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-002 |
| Titulo de prueba         | No se puede crear contrato para colaborador inexistente |
| Modulo / Caracteristicas | Módulo contratos |
| Descripción              | Verificar que el sistema no permita crear un contrato asociado a un colaborador que no existe en la base de datos |
| Precondiciones           | 1. Usuario registrado <br> 2. Colaborador inexistente en la DB |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo de contratos <br> 3. Completar el formulario con los datos requeridos para el contrato <br> 4. Seleccionar un colaborador inexistente para asociar <br> 5. Intentar enviar el formulario para crear el contrato <br> 6. Verificar que el sistema impide la creación y muestra un mensaje de error apropiado |
| Datos de entrada         | collaborator_id: (ID inexistente) <br> contract_type: Fijo <br> start_date: 2026-03-01 <br> end_date: 2027-05-17 <br> position: Analista de Datos <br> salary: 2800.00 <br> status: Activo |
| Resultado esperado       | 1. El sistema no crea el contrato <br> 2. Se muestra un mensaje de error apropiado <br> 3. No se modifica la tabla contracts |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-003

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-003 |
| Titulo de prueba         | Verificar que los campos de fecha y salario sean validados correctamente |
| Modulo / Caracteristicas | Módulo contratos |
| Descripción              | Verificar que el sistema valide correctamente los campos de fecha (start_date, end_date) y salario para evitar entradas inválidas |
| Precondiciones           | 1. Usuario registrado <br> 2. Acceso al módulo de contratos |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo de contratos <br> 3. Ingresar fechas inválidas (fecha fin menor que inicio o formato incorrecto) <br> 4. Ingresar salario inválido (texto o números negativos) <br> 5. Intentar enviar el formulario |
| Datos de entrada         | start_date: "2026-03-10" (válido) <br> end_date: "2026-03-05" (inválido) <br> salary: "-1000" o "abc" (inválido) |
| Resultado esperado       | 1. El sistema no permite enviar el formulario <br> 2. Error claro en campo fecha <br> 3. Error claro en salario <br> 4. No se modifica la tabla contracts |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-004

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-004 |
| Titulo de prueba         | Verificar que se puede actualizar un contrato existente |
| Modulo / Caracteristicas | Módulo contratos |
| Descripción              | Verificar que el sistema permita actualizar correctamente los datos de un contrato ya creado |
| Precondiciones           | 1. Usuario registrado <br> 2. Existencia de un contrato válido en la base de datos |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo de contratos <br> 3. Seleccionar un contrato existente <br> 4. Modificar campos <br> 5. Guardar cambios <br> 6. Verificar actualización |
| Datos de entrada         | position: modificar <br> salary: modificar |
| Resultado esperado       | 1. El sistema actualiza el contrato <br> 2. Se muestra mensaje de éxito <br> 3. La tabla contracts refleja los cambios |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---