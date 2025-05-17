import * as Yup from 'yup';

export const applicantSchema = Yup.object({
  name: Yup.string().required('Required'),
  age: Yup.number().required('Required'),
  contactNumber: Yup.string().required('Required'),
  email: Yup.string().email('Invalid email')
});

// Similarly create familySchema, businessSchema, etc.