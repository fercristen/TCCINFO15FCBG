
 The following SQL statements will be executed:

     ALTER TABLE noticias ADD CONSTRAINT FK_253D92520EF25B5 FOREIGN KEY (tem_id) REFERENCES temas (tem_id);
     ALTER TABLE noticias_imagens ADD CONSTRAINT FK_42BAD60F64892549 FOREIGN KEY (imagem_id) REFERENCES imagens (img_id);
     ALTER TABLE noticias_imagens ADD CONSTRAINT FK_42BAD60F99926010 FOREIGN KEY (noticia_id) REFERENCES noticias (not_id);
     CREATE UNIQUE INDEX UNIQ_EF687F251407DE4 ON usuarios (usu_login);
