import * as Yup from 'yup';

export const applicantSchema = Yup.object({
  name: Yup.string().required('Name is required'),
  its: Yup.string().required('ITS is required'),
  age: Yup.number().required('Age is required').positive('Age must be a positive number').integer('Age must be an integer'),
  mauzeJamiat: Yup.string().required('Mauze & Jamiat is required'),
  contactNumber: Yup.string().required('Contact Number is required').matches(/^\d{10}$/, 'Contact Number must be 10 digits'),
  email: Yup.string().email('Invalid email format').required('Email ID is required'),
  fullResidentialAddress: Yup.string().required('Full Residential Address is required'),
  presentOccupationAndWorkAddress: Yup.string().required('Present Occupation and Address of Place of Work is required'),
  otherRelevantInfo: Yup.string().notRequired(),
});

export const familySchema = Yup.object({
  familyMembers: Yup.string().required('Required'),
  income: Yup.number().required('Required'),
  expenses: Yup.number().required('Required'),
});

export const businessSchema = Yup.object({
  currentBusiness: Yup.string().required('Required'),
  competitors: Yup.string().required('Required'),
});

export const planSchema = Yup.object({
  actionPlan: Yup.string().required('Required'),
  timeline: Yup.string().required('Required'),
});

export const financeSchema = Yup.object({
  enayat: Yup.number().required('Required'),
  qardan: Yup.number().required('Required'),
});

export const declarationSchema = Yup.object({
  signature: Yup.string().required('Required'),
});