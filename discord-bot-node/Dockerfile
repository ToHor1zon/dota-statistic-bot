FROM node:20-alpine

# Установите bash и другие необходимые пакеты
# RUN apk update && apk add bash

# Установка рабочей директории в контейнере
WORKDIR /usr/src/app

# Копирование зависимостей проекта
COPY package.json package-lock.json ./

# Установка зависимостей
RUN npm ci

# Копирование остальных файлов проекта
COPY .env ./
COPY ./tsconfig.json ./
COPY src ./src

RUN npm run build

# Открытие порта, который будет слушать ваше приложение
EXPOSE 3000

# Команда для запуска приложения
CMD ["npm", "run", "start"]
