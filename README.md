# 🐄 Sistema de Controle de Fazenda Bovinos

Sistema web desenvolvido em **Laravel** para gerenciamento de fazendas bovinas, controle de gado, veterinários e regras de negócio do setor agropecuário.

---

## 📌 Funcionalidades

### 🏡 Fazendas
- Cadastro, edição e exclusão de fazendas
- Definição do tamanho em hectares
- Associação com veterinários (Many-to-Many)

### 🐄 Gado
- Cadastro completo de animais
- Controle de produção de leite, consumo de ração, peso e idade
- Associação com fazenda
- Regra de **limite máximo de 18 animais por hectare**
- Regra de **abate baseada em idade, peso, leite e ração**
- Relatório de animais abatidos

### 🩺 Veterinários
- CRUD completo
- CRMV único
- Relacionamento com fazendas

### 📊 Dashboard
- Total de leite produzido
- Total de ração consumida
- Quantidade de animais jovens com alto consumo
- Acesso rápido aos módulos do sistema

---

## 🧪 Testes Automatizados

- Teste de regra de negócio garantindo que **não é possível cadastrar mais de 18 animais por hectare**
- Utilização de **Factories** e **Feature Tests**
- ✅ Testes Implementados

-Teste de limite máximo de 18 animais por hectare

-Uso de Factories

-Testes de Feature com PHPUnit

-php artisan test
---

## 🛠️ Tecnologias Utilizadas

- PHP 8+
- Laravel
- MySQL
- Bootstrap 5
- PHPUnit

---

## 🚀 Como executar o projeto

```bash
git clone https://github.com/KennedyMoreira12/fazenda-bovinos.git
cd fazenda-bovinos
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
