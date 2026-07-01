/**
 * E2E Test Credentials
 * These are deterministic credentials seeded by E2ESeeder.php
 */

export const USERS = {
  admin: {
    email: 'Aryantiwari@findmyinterior.com',
    password: 'findmyinterior',
    role: 'admin',
  },
  homeowner: {
    email: 'homeowner@e2e.test',
    password: 'password',
    role: 'customer',
  },
  designer: {
    email: 'designer@e2e.test',
    password: 'password',
    role: 'business',
    displayRole: 'DESIGNER',
  },
  contractor: {
    email: 'contractor@e2e.test',
    password: 'password',
    role: 'business',
    displayRole: 'CONTRACTOR',
  },
  supplier: {
    email: 'supplier@e2e.test',
    password: 'password',
    role: 'supplier',
    displayRole: 'SUPPLIER',
  },
  worker: {
    email: 'worker@e2e.test',
    password: 'password',
    role: 'worker',
    displayRole: 'WORKER',
  },
  builder: {
    email: 'builder@e2e.test',
    password: 'password',
    role: 'builder',
    displayRole: 'BUILDER',
  },
};

export type UserKey = keyof typeof USERS;
