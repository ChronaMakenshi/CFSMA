PGDMP     7                    z           CFSMA    13.2    14.1 V    6           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            7           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            8           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            9           1262    16386    CFSMA    DATABASE     c   CREATE DATABASE "CFSMA" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'French_France.1252';
    DROP DATABASE "CFSMA";
                postgres    false            �            1259    16413    classes    TABLE     r   CREATE TABLE public.classes (
    id integer NOT NULL,
    filiere_id integer NOT NULL,
    name text NOT NULL
);
    DROP TABLE public.classes;
       public         heap    postgres    false            �            1259    16393    classes_id_seq    SEQUENCE     w   CREATE SEQUENCE public.classes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.classes_id_seq;
       public          postgres    false            �            1259    16422 
   compagnies    TABLE     K   CREATE TABLE public.compagnies (
    id integer NOT NULL,
    name text
);
    DROP TABLE public.compagnies;
       public         heap    postgres    false            �            1259    16395    compagnies_id_seq    SEQUENCE     z   CREATE SEQUENCE public.compagnies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.compagnies_id_seq;
       public          postgres    false            �            1259    49193    courpublics    TABLE     �   CREATE TABLE public.courpublics (
    id integer NOT NULL,
    matierepublic_id integer,
    name text NOT NULL,
    date date NOT NULL
);
    DROP TABLE public.courpublics;
       public         heap    postgres    false            �            1259    16397    courpublics_id_seq    SEQUENCE     {   CREATE SEQUENCE public.courpublics_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.courpublics_id_seq;
       public          postgres    false            �            1259    32848    cours    TABLE     �   CREATE TABLE public.cours (
    id integer NOT NULL,
    matiere_id integer,
    classe_id integer,
    name text NOT NULL,
    date date NOT NULL
);
    DROP TABLE public.cours;
       public         heap    postgres    false            �            1259    49154    cours_files    TABLE     �   CREATE TABLE public.cours_files (
    id integer NOT NULL,
    coursfile_id integer NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.cours_files;
       public         heap    postgres    false            �            1259    49152    cours_files_id_seq    SEQUENCE     {   CREATE SEQUENCE public.cours_files_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.cours_files_id_seq;
       public          postgres    false            �            1259    49202    cours_filesp    TABLE     �   CREATE TABLE public.cours_filesp (
    id integer NOT NULL,
    courfilesp_id integer NOT NULL,
    name character varying(255) NOT NULL
);
     DROP TABLE public.cours_filesp;
       public         heap    postgres    false            �            1259    49167    cours_filesp_id_seq    SEQUENCE     |   CREATE SEQUENCE public.cours_filesp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.cours_filesp_id_seq;
       public          postgres    false            �            1259    16399    cours_id_seq    SEQUENCE     u   CREATE SEQUENCE public.cours_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.cours_id_seq;
       public          postgres    false            �            1259    16387    doctrine_migration_versions    TABLE     �   CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);
 /   DROP TABLE public.doctrine_migration_versions;
       public         heap    postgres    false            �            1259    16449    filieres    TABLE     s   CREATE TABLE public.filieres (
    id integer NOT NULL,
    section_id integer NOT NULL,
    name text NOT NULL
);
    DROP TABLE public.filieres;
       public         heap    postgres    false            �            1259    16401    filieres_id_seq    SEQUENCE     x   CREATE SEQUENCE public.filieres_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.filieres_id_seq;
       public          postgres    false            �            1259    16458    matierepublics    TABLE     X   CREATE TABLE public.matierepublics (
    id integer NOT NULL,
    name text NOT NULL
);
 "   DROP TABLE public.matierepublics;
       public         heap    postgres    false            �            1259    16403    matierepublics_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.matierepublics_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.matierepublics_id_seq;
       public          postgres    false            �            1259    16466    matieres    TABLE     R   CREATE TABLE public.matieres (
    id integer NOT NULL,
    name text NOT NULL
);
    DROP TABLE public.matieres;
       public         heap    postgres    false            �            1259    16405    matieres_id_seq    SEQUENCE     x   CREATE SEQUENCE public.matieres_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.matieres_id_seq;
       public          postgres    false            �            1259    16482    sections    TABLE     u   CREATE TABLE public.sections (
    id integer NOT NULL,
    compagnie_id integer NOT NULL,
    name text NOT NULL
);
    DROP TABLE public.sections;
       public         heap    postgres    false            �            1259    16409    sections_id_seq    SEQUENCE     x   CREATE SEQUENCE public.sections_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.sections_id_seq;
       public          postgres    false            �            1259    49424    users    TABLE     �   CREATE TABLE public.users (
    id integer NOT NULL,
    section_id integer,
    classe_id integer,
    filiere_id integer,
    username character varying(180) NOT NULL,
    roles text NOT NULL,
    password character varying(255) NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            :           0    0    COLUMN users.roles    COMMENT     ;   COMMENT ON COLUMN public.users.roles IS '(DC2Type:array)';
          public          postgres    false    222            �            1259    16411    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false            '          0    16413    classes 
   TABLE DATA           7   COPY public.classes (id, filiere_id, name) FROM stdin;
    public          postgres    false    210   �]       (          0    16422 
   compagnies 
   TABLE DATA           .   COPY public.compagnies (id, name) FROM stdin;
    public          postgres    false    211   �]       1          0    49193    courpublics 
   TABLE DATA           G   COPY public.courpublics (id, matierepublic_id, name, date) FROM stdin;
    public          postgres    false    220   �]       -          0    32848    cours 
   TABLE DATA           F   COPY public.cours (id, matiere_id, classe_id, name, date) FROM stdin;
    public          postgres    false    216   U^       /          0    49154    cours_files 
   TABLE DATA           =   COPY public.cours_files (id, coursfile_id, name) FROM stdin;
    public          postgres    false    218   �^       2          0    49202    cours_filesp 
   TABLE DATA           ?   COPY public.cours_filesp (id, courfilesp_id, name) FROM stdin;
    public          postgres    false    221   %_                 0    16387    doctrine_migration_versions 
   TABLE DATA           [   COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
    public          postgres    false    200   �_       )          0    16449    filieres 
   TABLE DATA           8   COPY public.filieres (id, section_id, name) FROM stdin;
    public          postgres    false    212   Ia       *          0    16458    matierepublics 
   TABLE DATA           2   COPY public.matierepublics (id, name) FROM stdin;
    public          postgres    false    213   �a       +          0    16466    matieres 
   TABLE DATA           ,   COPY public.matieres (id, name) FROM stdin;
    public          postgres    false    214   �a       ,          0    16482    sections 
   TABLE DATA           :   COPY public.sections (id, compagnie_id, name) FROM stdin;
    public          postgres    false    215   <b       3          0    49424    users 
   TABLE DATA           a   COPY public.users (id, section_id, classe_id, filiere_id, username, roles, password) FROM stdin;
    public          postgres    false    222   xb       ;           0    0    classes_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.classes_id_seq', 7, true);
          public          postgres    false    201            <           0    0    compagnies_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.compagnies_id_seq', 22, true);
          public          postgres    false    202            =           0    0    courpublics_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.courpublics_id_seq', 74, true);
          public          postgres    false    203            >           0    0    cours_files_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.cours_files_id_seq', 327, true);
          public          postgres    false    217            ?           0    0    cours_filesp_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.cours_filesp_id_seq', 85, true);
          public          postgres    false    219            @           0    0    cours_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.cours_id_seq', 150, true);
          public          postgres    false    204            A           0    0    filieres_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.filieres_id_seq', 17, true);
          public          postgres    false    205            B           0    0    matierepublics_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.matierepublics_id_seq', 6, true);
          public          postgres    false    206            C           0    0    matieres_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.matieres_id_seq', 6, true);
          public          postgres    false    207            D           0    0    sections_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.sections_id_seq', 15, true);
          public          postgres    false    208            E           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 41, true);
          public          postgres    false    209            o           2606    16420    classes classes_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.classes DROP CONSTRAINT classes_pkey;
       public            postgres    false    210            r           2606    16429    compagnies compagnies_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.compagnies
    ADD CONSTRAINT compagnies_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.compagnies DROP CONSTRAINT compagnies_pkey;
       public            postgres    false    211            �           2606    49200    courpublics courpublics_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.courpublics
    ADD CONSTRAINT courpublics_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.courpublics DROP CONSTRAINT courpublics_pkey;
       public            postgres    false    220            �           2606    49158    cours_files cours_files_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.cours_files
    ADD CONSTRAINT cours_files_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.cours_files DROP CONSTRAINT cours_files_pkey;
       public            postgres    false    218            �           2606    49206    cours_filesp cours_filesp_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.cours_filesp
    ADD CONSTRAINT cours_filesp_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.cours_filesp DROP CONSTRAINT cours_filesp_pkey;
       public            postgres    false    221            ~           2606    32855    cours cours_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.cours
    ADD CONSTRAINT cours_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.cours DROP CONSTRAINT cours_pkey;
       public            postgres    false    216            m           2606    16392 <   doctrine_migration_versions doctrine_migration_versions_pkey 
   CONSTRAINT        ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);
 f   ALTER TABLE ONLY public.doctrine_migration_versions DROP CONSTRAINT doctrine_migration_versions_pkey;
       public            postgres    false    200            t           2606    16456    filieres filieres_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.filieres
    ADD CONSTRAINT filieres_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.filieres DROP CONSTRAINT filieres_pkey;
       public            postgres    false    212            w           2606    16465 "   matierepublics matierepublics_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.matierepublics
    ADD CONSTRAINT matierepublics_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.matierepublics DROP CONSTRAINT matierepublics_pkey;
       public            postgres    false    213            y           2606    16473    matieres matieres_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.matieres
    ADD CONSTRAINT matieres_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.matieres DROP CONSTRAINT matieres_pkey;
       public            postgres    false    214            |           2606    16489    sections sections_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.sections
    ADD CONSTRAINT sections_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.sections DROP CONSTRAINT sections_pkey;
       public            postgres    false    215            �           2606    49431    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    222            �           1259    49435    idx_1483a5e9180aa129    INDEX     L   CREATE INDEX idx_1483a5e9180aa129 ON public.users USING btree (filiere_id);
 (   DROP INDEX public.idx_1483a5e9180aa129;
       public            postgres    false    222            �           1259    49434    idx_1483a5e98f5ea509    INDEX     K   CREATE INDEX idx_1483a5e98f5ea509 ON public.users USING btree (classe_id);
 (   DROP INDEX public.idx_1483a5e98f5ea509;
       public            postgres    false    222            �           1259    49433    idx_1483a5e9d823e37a    INDEX     L   CREATE INDEX idx_1483a5e9d823e37a ON public.users USING btree (section_id);
 (   DROP INDEX public.idx_1483a5e9d823e37a;
       public            postgres    false    222            z           1259    16490    idx_2b96439852fbe437    INDEX     Q   CREATE INDEX idx_2b96439852fbe437 ON public.sections USING btree (compagnie_id);
 (   DROP INDEX public.idx_2b96439852fbe437;
       public            postgres    false    215            p           1259    16421    idx_2ed7ec5180aa129    INDEX     M   CREATE INDEX idx_2ed7ec5180aa129 ON public.classes USING btree (filiere_id);
 '   DROP INDEX public.idx_2ed7ec5180aa129;
       public            postgres    false    210            �           1259    49201    idx_3343c6dd2f1c5649    INDEX     X   CREATE INDEX idx_3343c6dd2f1c5649 ON public.courpublics USING btree (matierepublic_id);
 (   DROP INDEX public.idx_3343c6dd2f1c5649;
       public            postgres    false    220            �           1259    49159    idx_3653c98f5788f87    INDEX     S   CREATE INDEX idx_3653c98f5788f87 ON public.cours_files USING btree (coursfile_id);
 '   DROP INDEX public.idx_3653c98f5788f87;
       public            postgres    false    218            u           1259    16457    idx_c97a115d823e37a    INDEX     N   CREATE INDEX idx_c97a115d823e37a ON public.filieres USING btree (section_id);
 '   DROP INDEX public.idx_c97a115d823e37a;
       public            postgres    false    212                       1259    32857    idx_fdca8c9c8f5ea509    INDEX     K   CREATE INDEX idx_fdca8c9c8f5ea509 ON public.cours USING btree (classe_id);
 (   DROP INDEX public.idx_fdca8c9c8f5ea509;
       public            postgres    false    216            �           1259    32856    idx_fdca8c9cf46cd258    INDEX     L   CREATE INDEX idx_fdca8c9cf46cd258 ON public.cours USING btree (matiere_id);
 (   DROP INDEX public.idx_fdca8c9cf46cd258;
       public            postgres    false    216            �           1259    49207    idx_ff3653c923fd7518    INDEX     V   CREATE INDEX idx_ff3653c923fd7518 ON public.cours_filesp USING btree (courfilesp_id);
 (   DROP INDEX public.idx_ff3653c923fd7518;
       public            postgres    false    221            �           1259    49432    uniq_1483a5e9f85e0677    INDEX     R   CREATE UNIQUE INDEX uniq_1483a5e9f85e0677 ON public.users USING btree (username);
 )   DROP INDEX public.uniq_1483a5e9f85e0677;
       public            postgres    false    222            �           2606    49446    users fk_1483a5e9180aa129    FK CONSTRAINT     ~   ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_1483a5e9180aa129 FOREIGN KEY (filiere_id) REFERENCES public.filieres(id);
 C   ALTER TABLE ONLY public.users DROP CONSTRAINT fk_1483a5e9180aa129;
       public          postgres    false    222    2932    212            �           2606    49441    users fk_1483a5e98f5ea509    FK CONSTRAINT     |   ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_1483a5e98f5ea509 FOREIGN KEY (classe_id) REFERENCES public.classes(id);
 C   ALTER TABLE ONLY public.users DROP CONSTRAINT fk_1483a5e98f5ea509;
       public          postgres    false    210    222    2927            �           2606    49436    users fk_1483a5e9d823e37a    FK CONSTRAINT     ~   ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_1483a5e9d823e37a FOREIGN KEY (section_id) REFERENCES public.sections(id);
 C   ALTER TABLE ONLY public.users DROP CONSTRAINT fk_1483a5e9d823e37a;
       public          postgres    false    222    2940    215            �           2606    16528    sections fk_2b96439852fbe437    FK CONSTRAINT     �   ALTER TABLE ONLY public.sections
    ADD CONSTRAINT fk_2b96439852fbe437 FOREIGN KEY (compagnie_id) REFERENCES public.compagnies(id);
 F   ALTER TABLE ONLY public.sections DROP CONSTRAINT fk_2b96439852fbe437;
       public          postgres    false    215    211    2930            �           2606    16503    classes fk_2ed7ec5180aa129    FK CONSTRAINT        ALTER TABLE ONLY public.classes
    ADD CONSTRAINT fk_2ed7ec5180aa129 FOREIGN KEY (filiere_id) REFERENCES public.filieres(id);
 D   ALTER TABLE ONLY public.classes DROP CONSTRAINT fk_2ed7ec5180aa129;
       public          postgres    false    2932    212    210            �           2606    49208    courpublics fk_3343c6dd2f1c5649    FK CONSTRAINT     �   ALTER TABLE ONLY public.courpublics
    ADD CONSTRAINT fk_3343c6dd2f1c5649 FOREIGN KEY (matierepublic_id) REFERENCES public.matierepublics(id);
 I   ALTER TABLE ONLY public.courpublics DROP CONSTRAINT fk_3343c6dd2f1c5649;
       public          postgres    false    213    220    2935            �           2606    49160    cours_files fk_3653c98f5788f87    FK CONSTRAINT     �   ALTER TABLE ONLY public.cours_files
    ADD CONSTRAINT fk_3653c98f5788f87 FOREIGN KEY (coursfile_id) REFERENCES public.cours(id);
 H   ALTER TABLE ONLY public.cours_files DROP CONSTRAINT fk_3653c98f5788f87;
       public          postgres    false    218    2942    216            �           2606    16523    filieres fk_c97a115d823e37a    FK CONSTRAINT     �   ALTER TABLE ONLY public.filieres
    ADD CONSTRAINT fk_c97a115d823e37a FOREIGN KEY (section_id) REFERENCES public.sections(id);
 E   ALTER TABLE ONLY public.filieres DROP CONSTRAINT fk_c97a115d823e37a;
       public          postgres    false    212    2940    215            �           2606    32863    cours fk_fdca8c9c8f5ea509    FK CONSTRAINT     |   ALTER TABLE ONLY public.cours
    ADD CONSTRAINT fk_fdca8c9c8f5ea509 FOREIGN KEY (classe_id) REFERENCES public.classes(id);
 C   ALTER TABLE ONLY public.cours DROP CONSTRAINT fk_fdca8c9c8f5ea509;
       public          postgres    false    2927    216    210            �           2606    32858    cours fk_fdca8c9cf46cd258    FK CONSTRAINT     ~   ALTER TABLE ONLY public.cours
    ADD CONSTRAINT fk_fdca8c9cf46cd258 FOREIGN KEY (matiere_id) REFERENCES public.matieres(id);
 C   ALTER TABLE ONLY public.cours DROP CONSTRAINT fk_fdca8c9cf46cd258;
       public          postgres    false    2937    214    216            �           2606    49213     cours_filesp fk_ff3653c923fd7518    FK CONSTRAINT     �   ALTER TABLE ONLY public.cours_filesp
    ADD CONSTRAINT fk_ff3653c923fd7518 FOREIGN KEY (courfilesp_id) REFERENCES public.courpublics(id);
 J   ALTER TABLE ONLY public.cours_filesp DROP CONSTRAINT fk_ff3653c923fd7518;
       public          postgres    false    2949    220    221            '       x�3�4�442�2�F�F\朖`~� =/�      (      x�3�tv�u�22�0�b���� =��      1   I   x�37�4�L�/-*V�M,��4202�50�54�27�.ed�en�i���,.��,JEHp�� �=0$�b���� �#6      -   V   x�341�4B���TN##s]CC]C3.CSNc�xr~iQ�BFfqI~fX�����������	\EnbIH�X��@�Д+F��� �O      /   Z   x�364�441�L��,�+HI�262
Xp��I�9�%%�E�9P)$����ļ��T��9������knA|rbQ~Nf^zfjX6F��� j@#      2   l   x�u�;
�0E�z��/q��� c%0�!��Q�be����Kp�6/��#��T]	�z��]���T�x2e�]���������$Y���6�H�6���\)u~1�         �  x���=nA�zt
_�f8�ݦM�&�@�Ⱦ?�hwS��R�A$�����zy{�~�}��yy�8��^?�3	"]g[?�I�aO������C�ɹ��"A�X{I�:�w��A��� c�а��uT ��G�h�K�	0v�� ؛�J���9�:�qS: b�֌j�� �(��� gU��I6��`�D����z@ˀ�`��&NAh����,�uC�J ��?��Z	� �f�����I����>K���������o4������6� �Pl W!L+E,����o�{��l����4�Y�#W�WJ��'��k���F06�%�����&�Y���Gi�I��+	��u:߃ Y!:>�t�v:�� ���      )   ]   x�3�4�tuu�Ҿ.n\�����a���\��@��KP��
�241��&�
F\f �A���\��@fVFV6�!H0�8����H����� r�>      *   3   x�3�t�K�I�,�2�t+J�;��6��M,��2���,.��,J����� G}      +   3   x�3�t�K�I�,�2���,.��,J�2��M,��2�t+J�;�$���� <L}      ,   ,   x�3�4�6�2Q�\�&@�1%73��Д�Ȉ3=#�+F��� ��k      3   ,  x���Yo�P��k���5z�`�@)��i2A9�ɢ���36&u:���{���}  r���n�����L�����j�d���^���	��?��<��3 ��CU�Xd��Pٹ��::gj�To�j��J�޲�ٖ�yrQF���8���-�@����8]l�,�u3�I��˺����2lv"Ǐs�L���#�;��y�y簩��0$ٻ(
�� �u쟮;�un(M�;���Ѧc6��v��U�/˃�H:��t���FL>�޿94�o�q�KƧ�Dp$9d�X��eS�}ȴ�F���|�7�6�E�[��� �>��; U�(�_�l�z�jj�I7�<^��V�@�pE��(�GN~n�U�7X<-�&vM���E����C�7�c'�1/6��N�E�Fl��6����C\Q^�y{�n�MBI}ql0�J=����O#"�t��&��%*Y_�q�̒So���$�(<����#���N��0��_i��8�`u���^��{K'���	�µ�j���.��d�9��M\)��a�o��	     