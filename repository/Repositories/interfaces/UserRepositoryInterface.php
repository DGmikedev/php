<?php

interface UserRepositoryInterface
{
    public function findById(int $id): ?User;
    public function findAllUsers(): array;
    public function insertUser(string $name, string $email): bool;
}