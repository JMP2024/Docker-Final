FROM nginx:alpine


RUN chmod -R 755 /usr/share/nginx/html && \
    chown -R nginx:nginx /usr/share/nginx/html

# Copiar los archivos HTML, CSS y JS desde Html-Css-Js al directorio de Nginx
COPY ./Html-Css-Js /usr/share/nginx/html

# Copiar la configuración personalizada de Nginx si tienes un archivo de configuración
COPY ./nginx.conf /etc/nginx/nginx.conf

# Exponer el puerto 80 para el frontend
EXPOSE 80
