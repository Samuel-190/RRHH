# Casos de Prueba - Módulo de Terminación de Contratos

---

## CP-REG-001

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-001 |
| Titulo de prueba         | Verificar que se puede cambiar el estado de un contrato a "Terminado" |
| Modulo / Caracteristicas | Módulo terminación de contratos |
| Descripción              | Esta prueba verifica que el sistema permita cambiar el estado de un contrato activo a "Terminado" |
| Precondiciones           | 1. Usuario registrado <br> 2. Existe un contrato activo en la base de datos |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo de contratos <br> 3. Seleccionar un contrato activo <br> 4. Elegir la opción "Terminar contrato" <br> 5. Confirmar la acción |
| Datos de entrada         | contract_id: (ID existente) |
| Resultado esperado       | 1. El estado del contrato cambia a "Terminado" <br> 2. El cambio queda guardado en la base de datos |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-002

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-002 |
| Titulo de prueba         | Verificar que se registra correctamente la fecha y el motivo de la terminación |
| Modulo / Caracteristicas | Módulo terminación de contratos |
| Descripción              | Esta prueba valida que al terminar un contrato se registren correctamente la fecha y el motivo de la terminación |
| Precondiciones           | 1. Usuario registrado <br> 2. Existe un contrato activo en la base de datos |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo de contratos <br> 3. Seleccionar un contrato activo <br> 4. Elegir la opción "Terminar contrato" <br> 5. Ingresar la fecha y el motivo de terminación <br> 6. Guardar la información |
| Datos de entrada         | termination_date: 2025-06-01 <br> reason: Renuncia voluntaria |
| Resultado esperado       | 1. El sistema registra la fecha de terminación correctamente <br> 2. El motivo queda almacenado <br> 3. La información se guarda en la tabla correspondiente |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-003

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-003 |
| Titulo de prueba         | Verificar que no se puede terminar un contrato que ya ha finalizado |
| Modulo / Caracteristicas | Módulo terminación de contratos |
| Descripción              | Esta prueba valida que el sistema no permita terminar un contrato que ya se encuentra en estado "Terminado" o "Finalizado" |
| Precondiciones           | 1. Usuario registrado <br> 2. Existe un contrato con estado "Terminado" o "Finalizado" |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo de contratos <br> 3. Seleccionar un contrato terminado <br> 4. Intentar ejecutar la opción "Terminar contrato" |
| Datos de entrada         | contract_id: (ID de contrato terminado) |
| Resultado esperado       | 1. El sistema bloquea la acción <br> 2. Se muestra un mensaje de error <br> 3. No se realizan cambios en la base de datos |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---