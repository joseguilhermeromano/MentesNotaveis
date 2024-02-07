# Estágio de desenvolvimento
FROM node:21.6.1-alpine as develop

RUN addgroup app && adduser -S -G app app
RUN mkdir /app && chown -R app:app /app
RUN chmod -R 755 /app
USER app
WORKDIR /app

COPY package*.json ./
# Add `/app/node_modules/.bin` to $PATH
ENV PATH /app/node_modules/.bin:$PATH

# Install dependencies
RUN npm install --legacy-peer-deps && npm cache clean --force
COPY . .

EXPOSE 3000
# Deploy app for local development
CMD npm start --disableHostCheck true
