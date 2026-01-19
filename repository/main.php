<?php

/*


Concepto	               	 Dónde

Inyección de dependencias	 Constructor
Interfaces	                 Repository
SOLID (DIP, SRP)	         Diseño
Desacoplamiento	             Service
Encapsulación	             Repository
Separación de capas	         Arquitectura


Diagrama – Repository Pattern (PHP)

┌─────────────────────┐
│     index.php       │
│  (Controller / UI)  │
└─────────┬───────────┘
          │
          │ llama métodos
          ▼
┌─────────────────────┐
│     UserService     │
│  (Business Logic)   │
│─────────────────────│
│ - register()        │
│ - listUsers()       │
│─────────────────────│
│ DEPENDE DE          │
│ UserRepositoryInterface
└─────────┬───────────┘
          │
          │ contrato (interface)
          ▼
┌────────────────────────────────┐
│ UserRepositoryInterface        │
│--------------------------------│
│ + insertUser(User $user)       │
│ + findById(int $id)            │
│ + getAll(): array              │
└─────────┬──────────────────────┘
          │
          │ implementa
          ▼
┌──────────────────────────────┐
│     UserRepository           │
│ (Data Access / Persistence)  │
│------------------------------│
│ - PDO $db                    │
│------------------------------│
│ + insertUser(User $user)     │
│ + findById(int $id)          │
│ + getAll()                   │
└─────────┬────────────────────┘
          │
          │ SQL / ORM
          ▼
┌─────────────────────┐
│    Base de Datos    │
│   (MySQL / etc)     │
└─────────────────────┘
*/