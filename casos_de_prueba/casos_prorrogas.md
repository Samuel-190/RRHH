# Casos de Prueba - Módulo de Prórrogas

---

## CP-REG-001

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-001 |
| Titulo de prueba         | Verificar que se puede añadir una prórroga (en tiempo o valor) a un contrato de tipo "Fijo" o "Prestación de Servicios" |
| Modulo / Caracteristicas | Módulo prórrogas |
| Descripción              | Validar que el sistema permita agregar una prórroga a contratos de tipo Fijo o Prestación de Servicios, ya sea extendiendo el tiempo del contrato o aumentando su valor |
| Precondiciones           | 1. Usuario registrado <br> 2. Debe existir un contrato registrado de tipo Fijo o Prestación de Servicios |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Acceder al módulo Contratos <br> 3. Buscar y seleccionar un contrato de tipo Fijo o Prestación de Servicios <br> 4. Seleccionar la opción Agregar prórroga <br> 5. Elegir el tipo de prórroga (por tiempo o por valor) <br> 6. Ingresar los datos correspondientes <br> 7. Guardar la prórroga |
| Datos de entrada         | extension_type: Tiempo <br> new_end_date: 2026-12-31 <br> additional_value: NULL <br> description: Prórroga de 6 meses al contrato |
| Resultado esperado       | 1. El sistema registra la prórroga correctamente <br> 2. La asocia al contrato seleccionado |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-002

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-002 |
| Titulo de prueba         | Verificar que la fecha de finalización del contrato se actualiza correctamente al añadir una prórroga de tiempo |
| Modulo / Caracteristicas | Módulo prórrogas |
| Descripción              | Validar que al registrar una prórroga de tipo Tiempo, el sistema actualice correctamente la fecha de finalización del contrato |
| Precondiciones           | 1. Usuario registrado <br> 2. Existe un contrato activo de tipo Fijo o Prestación de Servicios <br> 3. El contrato tiene una fecha de finalización registrada |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Ir al módulo Contratos <br> 3. Buscar y seleccionar un contrato activo <br> 4. Verificar la fecha de finalización actual del contrato <br> 5. Seleccionar la opción Agregar prórroga <br> 6. Elegir el tipo de extensión Tiempo <br> 7. Ingresar una nueva fecha de finalización <br> 8. Guardar la prórroga <br> 9. Revisar la información actualizada del contrato |
| Datos de entrada         | extension_type: Tiempo <br> new_end_date: 2027-03-31 <br> additional_value: NULL <br> description: Prórroga de 3 meses |
| Resultado esperado       | 1. El sistema registra la prórroga correctamente <br> 2. La fecha de finalización del contrato se actualiza con la nueva fecha ingresada |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---

## CP-REG-003

| CAMPO                     | INFORMACIÓN |
|--------------------------|------------|
| Id del caso              | CP-REG-003 |
| Titulo de prueba         | Verificar que el sistema rechaza una prórroga para un contrato con estado "Terminado" o "Finalizado" |
| Modulo / Caracteristicas | Módulo prórrogas |
| Descripción              | Validar que el sistema no permita registrar una prórroga cuando el contrato se encuentra en estado Terminado o Finalizado |
| Precondiciones           | 1. Usuario registrado <br> 2. Existe un contrato registrado con estado Terminado o Finalizado |
| Pasos para la ejecución  | 1. Iniciar sesión como usuario válido <br> 2. Acceder al módulo Contratos <br> 3. Buscar y seleccionar un contrato con estado Terminado o Finalizado <br> 4. Intentar seleccionar la opción Agregar prórroga <br> 5. Ingresar los datos de la prórroga <br> 6. Intentar guardar la prórroga |
| Datos de entrada         | extension_type: Tiempo <br> new_end_date: 2027-06-30 <br> additional_value: NULL <br> description: Intento de prórroga a contrato finalizado |
| Resultado esperado       | 1. El sistema rechaza la creación de la prórroga <br> 2. No se registra ninguna prórroga en el sistema |
| Resultado real           | (Para ser completado durante la ejecución) |
| Estado                   | (Pasa / falla / no ejecuta) |

---